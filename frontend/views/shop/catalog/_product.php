<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 31.08.17
 * Time: 10:53
 */

/* @var $this yii\web\View */
/* @var $product core\entities\Shop\Product\Product */

use core\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$url = Url::to(['catalog/product', 'id' =>$product->id]);
?>

<div class="product-line__item">
    <!-- .stock -->
    <div class="stock">
        <p class="stock__title">Цена
            <br>недели</p>
        <div class="stock__discount">
            -20%
        </div>
    </div>
    <!-- .stock -->
    <!-- .product-line__item__logo -->
    <div class="product-line__item__logo">
        <img src="http://static.yii2-shop.test/product-logo.png" alt="">
    </div>
    <!-- .product-line__item__logo -->
    <!-- .product-line__img -->
    <div class="product-line__img">
        <div class="image">
            <a href="<?= Html::encode($url) ?>">
                <?php if ($product->mainPhoto): ?>
                    <img src="<?= Html::encode($product->mainPhoto->getThumbFileUrl('file', 'catalog_list')) ?>" alt="" class="" />
                <?php else: ?>
                    <img src="http://static.yii2-shop.test/product-img-1.png" alt="">
                <?php endif; ?>
            </a>
        </div>
    </div>
    <!-- .product-line__img -->
    <!-- .product-line__title -->
    <div class="product-line__title">
        <p><a href="<?= Html::encode($url) ?>"><?= StringHelper::truncateWords(Html::encode($product->name), 20) ?></a></p>
    </div>
    <!-- .product-line__title -->
    <span class="vendor_code">Артикул: s101003</span>
    <!-- .price_block -->
    <div class="price_block price_stock">

        <?php if (!$product->warehousesProduct->isSpecial()): ?>
            <p class="prace_new"><?= PriceHelper::format($product->warehousesProduct->price) ?></p>
        <?php else: ?>
            <p class="price_old"><?= PriceHelper::format($product->warehousesProduct->price) ?></p>
            <p class="prace_new"><?= PriceHelper::format($product->warehousesProduct->special) ?></p>
        <?php endif; ?>

    </div>
    <!-- .price_block -->
    <!-- .product-line__item__action-block -->
    <div class="product-line__item__action-block">
<!--        //TODO need response login or not login and isset in woshlist, add or delete-->
        <a href="<?= Url::to(['/cabinet/wishlist/add', 'id' => $product->id]) ?>" onclick="wishlist.add('<?= $product->id ?>');" data-method="post" class="like">
            <i class="fa fa-heart" aria-hidden="true"></i>
        </a>
        <?= Html::beginForm(['/shop/cart/add', 'id' => $product->id], 'post') ?>
            <?= Html::input('number', 'AddToCartForm[quantity]', 1, ['min-length' => 1]) ?>
            <?= Html::submitButton('В КОРЗИНУ', ['class' => 'btn btn-to-cart']) ?>
        <?= Html::endForm() ?>
    </div>

    <div class="clearfix"></div>
    <?= \alfa6661\widgets\Raty::widget([
        'name' => 'user-vote',
        'options' => [
            'class' => 'star',
            'id' => 'user-vote'
        ],
        'pluginOptions' => [
            'click' => new \yii\web\JsExpression('function(score, e) {
                                            alert(score);
                                        }')
        ]
    ]); ?>
    <!-- .product-line__item__action-block -->
    <div class="review">
        <a href="#" class="pull-right">Оставить отзыв</a>
    </div>
</div>
