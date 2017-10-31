<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 31.08.17
 * Time: 16:33
 */

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */


?>
<?php $this->beginContent('@frontend/views/layouts/main.php') ?>

    <div class="container">
        <div class="profile-page">
            <div class="row">
                <div class="hidden visible-xs">
                    <div class="bread_crumbs">
                        <ul>
                            <li><a href="#">Вы здесь: Канцтовары </a></li>
                            <li><a href="#">Письменные принадлежности</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="left-nav-block">
                        <ul>
                            <li><a href="<?= Html::encode(Url::to(['/cabinet/default/index'])) ?>">Личные данные</a></li>
                            <li><a href="<?= Html::encode(Url::to(['/auth/reset/request'])) ?>">Забыли пароль</a></li>
                            <li><a href="<?= Html::encode(Url::to(['/cabinet/wishlist/index'])) ?>">Избранное</a></li>
                            <li><a href="#">История заказов</a></li>
                            <li><a href="#">Отзывы</a></li>
                            <li><a href="#">Персональное предложение</a></li>
                            <li><a href="#">Просмотренные</a></li>
                        </ul>
                    </div>
                    <div class="responsive-img">
                        <img src="images/b.png" alt="">
                    </div>
                </div>
                <div class="col-sm-9 ">
                    <?= $content ?>
                </div>
            </div>
        </div>

    </div>


<?php $this->endContent() ?>