<?php
/**
 * This class is registered and confirmed user into system.
 */

namespace core\useCases\auth;

use core\entities\User\User;
use core\forms\auth\SignupForm;
use core\repositories\UserRepository;
use yii\mail\MailerInterface;
use core\services\newsletter\Newsletter;
use core\access\Rbac;
use core\services\RoleManager;
use core\services\TransactionManager;

class SignupService
{
    private $mailer;
    private $users;
    private $roles;
    private $transaction;
    private $newsletter;

    public function __construct(
        UserRepository $users,
        MailerInterface $mailer,
        RoleManager $roles,
        TransactionManager $transaction,
        Newsletter $newsletter
    )
    {
        $this->mailer = $mailer;
        $this->users = $users;
        $this->roles = $roles;
        $this->transaction = $transaction;
        $this->newsletter = $newsletter;
    }

    public function signup(SignupForm $form): void
    {
        $user = User::requestSignup(
            $form->username,
            $form->email,
            $form->password
        );

        $this->transaction->wrap(function () use ($user) {
            $this->users->save($user);
            $this->roles->assign($user->id, Rbac::ROLE_USER);
        });

        $send = $this->mailer
            ->compose(
                ['html' => 'auth/signup/confirm-html', 'text' => 'auth/signup/confirm-text'],
                ['user' => $user]
            )
            ->setTo($form->email)
            ->setSubject('Signup confirm for ' . \Yii::$app->name)
            ->send();
        if (!$send) {
            throw new \RuntimeException('Email sending error.');
        }
    }

    public function confirm($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }
        $user = $this->users->getByEmailConfirmToken($token);
        $user->confirmSignup();
        $this->users->save($user);
        $this->newsletter->subscribe($user->email);
    }
}