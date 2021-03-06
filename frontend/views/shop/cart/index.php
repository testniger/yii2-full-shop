<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 11.09.17
 * Time: 9:11
 */

/* @var $this yii\web\View */
/* @var $cart \core\cart\Cart */
/* @var $warehouseCurrent \core\entities\Shop\Warehouse */
/* @var $warehouseDefault \core\entities\Shop\Warehouse */
/* @var $fileModel \core\forms\Shop\Cart\FileAddToCartForm */
/* @var $model \core\forms\Shop\Order\OrderForm */

use core\helpers\PriceHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->registerJsFile('/js/pages/cart.js');

$this->title = 'Shopping Cart';
$this->params['breadcrumbs'][] = ['label' => 'Catalog', 'url' => ['/shop/catalog/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cart-page" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <h1 class="main-title uppercase"><?= Html::encode($this->title) ?></h1>

        <div class="custom-btn-wrp">
            <button class="custom-btn"><span class="icon"><img src="/images/system/printer.png" alt="">&nbsp;&nbsp;Распечатать</span></button>
            <button class="custom-btn"><span class="icon"><img src="/images/system/download.png" alt="">&nbsp;&nbsp;Скачать</span></button>
        </div>

        <div class="cart-table-wrp">
            <?php Pjax::begin(['id' => 'cartPjaxSection', 'enablePushState' => true]); ?>
            <?php $cost = $cart->getCost() ?>
            <div class="cart-table-wrp-overflow" style="    overflow-x: auto;">
            <table>
                <tr>
                    <td></td>
                    <td>Наименование</td>
                    <td>Артикул</td>
                    <td>Цена, грн</td>
                    <td>Скидка</td>
                    <td>Количество</td>
                    <td>Сумма, грн</td>
                    <td>Наличие</td>
                </tr>

                <?php foreach ($cart->getItems() as $item): ?>
                    <?php
                    $product = $item->getProduct();
                    $modificationAssignments = $item->getModificationAssignments();
                    $url = Url::to(['/shop/catalog/product', 'id' => $product->id]);
                    ?>
                    <tr class="cart-item">
                        <td>
                            <input type="checkbox">
                            <a href="<?= $url ?>">
                                <?php if ($product->mainPhoto): ?>
                                    <img src="<?= $product->mainPhoto->getThumbFileUrl('file', 'cart_list') ?>" alt="" class="" />
                                <?php endif; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= $url ?>"><?= Html::encode($product->name) ?></a> <br>

                        </td>
                        <td class="text-left">
                            <?= $product->code ?>

                        </td>
                        <td>
                            <?php if ($item->isSpecial()): ?>
                                <span><?= PriceHelper::format($product->warehousesProduct->price) ?></span>
                                <span class="text-danger"><?= PriceHelper::format($item->getPrice()) ?></span>
                            <?php elseif ($item->isDiscounted($cost->getDiscountPercent())): ?>
                                <span><?= PriceHelper::format($item->getPrice()) ?></span>
                                <span class="text-danger"><?= PriceHelper::format($item->getDiscountedPrice($cost->getDiscountPercent())) ?></span>
                            <?php else: ?>
                                <?= PriceHelper::format($item->getPrice()) ?>
                            <?php endif; ?>
                           </td>
                        <td>
                            <span data-toggle="popover" data-trigger="hover" data-placement="right"
                                  data-content="
                                    <?php if ($item->isSpecial()): ?>
                                        special discount
                                    <?php elseif ($item->isDiscounted($cost->getDiscountPercent())): ?>
                                        <?php foreach ($cost->getDiscounts() as $discount): ?>
                                            <?= $discount->getDescription() ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                         no discount
                                    <?php endif; ?>
                                    ">
                                 <?= PriceHelper::percent($item->getDiscountPercent($cost->getDiscountPercent())) ?>
                            </span>




                        </td>
                        <td>
                            <?= Html::beginForm(['quantity', 'id' => $item->getId()], 'post', ['class' => 'form-inline quantity-form']); ?>
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <?= Html::input('hidden', 'id', $item->getId()) ?>
                                    <input type="number" name="quantity" value="<?= $item->getQuantity() ?>" size="1" class="form-control" />
                                    <span class="input-group-btn">
                                        <button type="submit" title="" class="btn btn-primary" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                        <button title="Remove" class="btn btn-danger" onclick="cart.remove('<?= $item->getId(); ?>')"><i class="fa fa-times-circle"></i></button>
                                    </span>
                                </div>
                            <?= Html::endForm() ?>
                        </td>
                        <td><?= PriceHelper::format($item->getCostWithDiscount($cost->getDiscountPercent())) ?></td>
                        <td><?= $product->warehousesProduct->extraStatus->name ?></td>
                    </tr>
                    <?php if ($modificationAssignments): ?>
                        <?php foreach ($modificationAssignments as $assignment): ?>
                            <tr class="modification">
                                <td><span onclick="cart.removeModification('<?= $assignment->modification_id ?>', '<?= $item->getId() ?>')"> <i class="fa fa-times" aria-hidden="true"></i></span></td>
                                <td><?= Html::encode($assignment->modification->name) ?></td>
                                <td><?= $assignment->modification->code ?></td>
                                <td><?= PriceHelper::format($product->getModificationPrice($assignment->modification_id)) ?></td>
                                <td></td>
                                <td>
                                    <?= $item->getModificationQuantity($assignment->modification->id) ?>
                                </td>
                                <td><?= PriceHelper::format($item->getModificationCost($assignment->modification_id)) ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
            </div>
            <div class="table-nav">
                <ul>
                    <li><a href="#">Выделить все</a></li>
                    <li><a href="#">Удалить</a></li>
                </ul>
            </div>

            <div class="cart-table-mobile">
                <div class="mobile--item">
                    <p class="mobile--item--title">Мультифункциональное устройство MECANIX, красный</p>
                    <p class="mobile--item--article">Артикул <b>32.034.20</b></p>
                    <div class="mobile--item--img-wrp">
                        <img src="http://placehold.it/300x300" alt="">
                    </div>

                    <div class="mobile--item-info">
                        <p class="mobile--item--price"></p>
                        <p class="mobile--item--cout"></p>
                    </div>

                    <div class="mobile--item--nav">

                        <a href="#" class="like">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                        <input type="number" value="1">
                        <button type="button" class="btn " aria-label="Left Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="mobile--item">
                    <p class="mobile--item--title">Мультифункциональное устройство MECANIX, красный</p>
                    <p class="mobile--item--article">Артикул <b>32.034.20</b></p>
                    <div class="mobile--item--img-wrp">
                        <img src="http://placehold.it/300x300" alt="">
                    </div>

                    <div class="mobile--item-info">
                        <p class="mobile--item--price"></p>
                        <p class="mobile--item--cout"></p>
                    </div>

                    <div class="mobile--item--nav">

                        <a href="#" class="like">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                        <input type="number" value="1">
                        <button type="button" class="btn " aria-label="Left Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="mobile--item">
                    <p class="mobile--item--title">Мультифункциональное устройство MECANIX, красный</p>
                    <p class="mobile--item--article">Артикул <b>32.034.20</b></p>
                    <div class="mobile--item--img-wrp">
                        <img src="http://placehold.it/300x300" alt="">
                    </div>

                    <div class="mobile--item-info">
                        <p class="mobile--item--price"></p>
                        <p class="mobile--item--cout"></p>
                    </div>

                    <div class="mobile--item--nav">

                        <a href="#" class="like">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                        <input type="number" value="1">
                        <button type="button" class="btn " aria-label="Left Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="mobile--item">
                    <p class="mobile--item--title">Мультифункциональное устройство MECANIX, красный</p>
                    <p class="mobile--item--article">Артикул <b>32.034.20</b></p>
                    <div class="mobile--item--img-wrp">
                        <img src="http://placehold.it/300x300" alt="">
                    </div>

                    <div class="mobile--item-info">
                        <p class="mobile--item--price"></p>
                        <p class="mobile--item--cout"></p>
                    </div>

                    <div class="mobile--item--nav">

                        <a href="#" class="like">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                        <input type="number" value="1">
                        <button type="button" class="btn " aria-label="Left Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="mobile--item">
                    <p class="mobile--item--title">Мультифункциональное устройство MECANIX, красный</p>
                    <p class="mobile--item--article">Артикул <b>32.034.20</b></p>
                    <div class="mobile--item--img-wrp">
                        <img src="http://placehold.it/300x300" alt="">
                    </div>

                    <div class="mobile--item-info">
                        <p class="mobile--item--price"></p>
                        <p class="mobile--item--cout"></p>
                    </div>

                    <div class="mobile--item--nav">

                        <a href="#" class="like">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                        <input type="number" value="1">
                        <button type="button" class="btn " aria-label="Left Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="mobile--item">
                    <p class="mobile--item--title">Мультифункциональное устройство MECANIX, красный</p>
                    <p class="mobile--item--article">Артикул <b>32.034.20</b></p>
                    <div class="mobile--item--img-wrp">
                        <img src="http://placehold.it/300x300" alt="">
                    </div>

                    <div class="mobile--item-info">
                        <p class="mobile--item--price"></p>
                        <p class="mobile--item--cout"></p>
                    </div>

                    <div class="mobile--item--nav">

                        <a href="#" class="like">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                        <input type="number" value="1">
                        <button type="button" class="btn " aria-label="Left Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-6">
                    <p class=" delivery-time"> Срок поставки:

                    <span class="red"><?= $cart->getMaxDeliveryTerm(); ?></span></p>
                    <?php if ($cart->issetExpectedStatus()): ?>
                        <p>(в корзине присутствует товар под заказ)</p>
                    <?php endif; ?>

                </div>
                <div class="col-sm-6 text-left-xs">
                    <p class="text-right link-in-p">Доставка согласно <a href="#/">тарифов перевозчика </a>Новая почта</p>
                    <p class="text-right"><b>Стоимость без скидки (включая НДС): <span class="red price"><?= PriceHelper::format($cost->getOriginWithoutAnyDiscount()) ?></span></b></p>
                    <p class="text-right"> Экономия: <span class="red"><?= PriceHelper::format($cost->getCostAllDiscount()) ?></span></p>
                    <p class="text-right"><b>Итого к оплате (включая НДС): <span class="red price"><?= PriceHelper::format($cost->getTotal()) ?></span></b></p>
                </div>
            </div>
            <?php Pjax::end(); ?>
            <div class="box" style="margin-top: 30px;">
                <div class="col-sm-6 col-xs-12">
                    <?= Html::beginForm(['/shop/cart/fast-add'], 'post') ?>

                        <p>Быстрое добавление товара в корзину по артикулу</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= Html::input('text', 'code', null, ['class' => 'input-add-tovar']) ?>

                        </div>
                        <div class="col-sm-3">
                            <?= Html::input('number', 'quantity', 1, ['min-length' => 1, 'class' => 'input-add-tovar']) ?>

                        </div>
                        <div class="col-sm-3">
                            <?= Html::submitButton('Добавить', ['class' => 'btn']) ?>
                        </div>


                    </div>
                    <p class="link-in-p"><a href="#" download="/">Скачать</a> каталог товаров (PDF,~56MB)</p>
                    <?= Html::endForm() ?>

                </div>
                <div class="hidden visible-xs clearfix">
                    <br>
                </div>

                <div class="col-sm-6 col-xs-12">


                    <?php $fileForm = ActiveForm::begin([
                        'method' => 'post',
                        'action' => '/shop/cart/file-add',
                        'options' => ['enctype' => 'multipart/form-data'],
                        ]) ?>

                        <p>Множественное добавление товаров в корзину из файла</p>
                    <?= $fileForm->field($fileModel, 'file')->fileInput() ?>
<!--                        <div class="filebtnwrp">-->
<!---->
<!--                            <div class="fileupload fileupload-new" data-provides="fileupload">-->
<!--                            <span class="btn-add-tovar btn-file">-->
<!--                                <span class="fileupload-new">ВЫБРАТЬ ФАЙЛ</span>-->
<!--                                <span class="fileupload-exists">Изменить</span>-->
<!---->
<!--                            </span>-->
<!--                                <span class="fileupload-preview"></span>-->
<!--                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>-->
<!---->
<!---->
<!--                            </div>-->
<!---->
<!--                        </div>-->
                        <!--<input type="file" class="btn-add-tovar">ВЫБРАТЬ ФАЙЛ</input>-->
                        <input type="submit" value="Добавить" class="btn">
                        <div class="clearfix"></div>
                        <p class="link-in-p"><a href="#" download="/">Скачать</a> пример файла (CSV)</p>
                        <?php ActiveForm::end() ?>

                </div>
                <div class="clearfix"></div>
            </div>
            <!-- end box -->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="main-title uppercase">Оформить заказ</h1>
                </div>
                <div class="col-sm-6">

                    <div class="attention">
                        Внимание! Сумма минимального заказа: <br>
                        для города <?= $warehouseCurrent->city->name ?> - <?= PriceHelper::format($warehouseCurrent->min_order) ?>
                        для доставки по Украине - <?= PriceHelper::format($warehouseDefault->min_order) ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1 box checkout ">

                <?= $this->render('_order-form', ['model' => $model]); ?>


            </div>
        </div>
    </div>
</div>







