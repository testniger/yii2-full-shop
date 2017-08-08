<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 08.08.17
 * Time: 10:26
 */

namespace shop\entities\User;

use Webmozart\Assert\Assert;
use yii\db\ActiveRecord;

/**
 * Class Network
 * @package shop\entities\User
 * @property  integer $user_id
 * @property  string $identity
 * @property  string $network
 */
class Network extends ActiveRecord
{
    public static function create($network, $identity): self
    {
        Assert::notEmpty($network);
        Assert::notEmpty($identity);

        $item = new static();
        $item->network = $network;
        $item->identity = $identity;
        return $item;
    }

    public static function tableName()
    {
        return '{{%user_networks}}';
    }

}