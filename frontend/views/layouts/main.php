<?php
/**
 * Created by PhpStorm.
 * User: volynets
 * Date: 31.08.17
 * Time: 9:16
 */

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\jquery\formstyler\FormStylerAsset;
use yii\helpers\Url;
use common\widgets\Alert;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!-- ADD STYLE -->

    <!-- Normalize
    <link rel="stylesheet" href="libs/normalize-css/normalize.css"> -->
    <!-- Hamburgers -->
    <!-- <link rel="stylesheet" href="libs/css-hamburgers/dist/hamburgers.min.css"> -->
    <!-- Font Awesome -->
<!--    <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">-->
    <!-- Slick Carousel -->
    <!-- <link rel="stylesheet" href="libs/slick-carousel/slick/slick.css"> -->
    <!-- <link rel="stylesheet" href="libs/slick-carousel/slick/slick-theme.css"> -->

    <!-- Bootstrap -->

<!--    <link rel="stylesheet" href="libs/jquery-ui/jquery-ui.min.css">-->
<!--    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="libs/selectric/selectric.css">-->
<!--    <link rel="stylesheet" href="libs/swiper/css/swiper.min.css">-->
<!--    <link rel="stylesheet" href="libs/jquery.mmenu/jquery.mmenu.all.css">-->

<!--    <link rel="stylesheet" href="libs/jQueryFormStyler/dist/jquery.formstyler.css">-->
<!--    <link rel="stylesheet" href="libs/jQueryFormStyler/dist/jquery.formstyler.theme.css">-->

    <!-- Theme Bootstrap
    <link rel="stylesheet" href="libs/bootstrap/dist/css/bootstrap-theme.min.css"> -->

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <!-- Less/Sass generated style -->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <link rel="stylesheet" href="css/media.css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- Yandex.Metrika counter -->
    <!-- /Yandex.Metrika counter -->
    <!-- Google Analytics counter -->
    <!-- /Google Analytics counter -->
</head>

<?php $this->beginBody() ?>
<body>
<header role="banner">

    <!-- .top-nav -->
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <ul class="top-nav__info-menu">
                        <li><a href="#">О компании</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Оплата и доставка</a></li>
                        <li><a href="#">Помощь</a></li>
                        <li><a href="#">$ Система скидок</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-2 pull-right">
                    <select name="#" id="">
                        <option value="1">Киев</option>
                        <option value="2">Харьков</option>
                        <option value="3">Одесса</option>
                        <option value="5">Запорожье</option>
                        <option value="6">Львов</option>
                        <option value="7">Хмельницкий</option>
                        <option value="9">Северодонецк</option>
                    </select>
                </div>
                <div class="col-xs-12 col-md-2 col-lg-1 pull-right">
                    <!-- .lang-btn -->
                    <div class="lang">
                        <label for="lang-btn"><span class="ua">укр</span></label>
                        <div class="lang-btn">
                            <input type="checkbox" value="None" id="lang-btn" name="check" checked/>
                            <label for="lang-btn"></label>
                        </div>
                        <label for="lang-btn"><span class="ru act">рус</span></label>
                    </div>
                    <!-- end .lang-btn -->
                </div>
            </div>
        </div>
    </div>
    <!-- end top-nav -->
    <!-- .top-info -->
    <div class="top-info">
        <div class="container">
            <div class="row">
                <div class="flex-btw-center">
                    <div class="col-xs-12 col-md-5 col-lg-4">
                        <div class="top-logo-block">
                            <a href="<?= Url::home() ?>">
                                <div class="logo">
                                    <img src="/images/system/logo-papirus.png" alt="">
                                </div>
                            </a>

                            <div class="top-logo-info">
                                <p>Интернет-магазин</p>
                                <p>Все для офiсу</p>
                                <p>более 15 000 товаров</p>
                            </div>
                            <div class="claerfix"></div>
                        </div>
                    </div>
                    <!-- end .md3 -->
                    <div class="col-xs-12 col-md-5">
                        <div class="advantages">
                            <img src="/images/system/car-icon.png" alt="">
                            <p>Собственый
                                <br>автопарк</p>
                            <p><img src="/images/system/header-arrow.png" alt=""> </p>
                            <p class="number">120</p>
                            <p>Разногабаритных автомобилей
                                <br> для быстрой доставки</p>
                        </div>
                    </div>
                    <!-- end md5 -->
                    <div class="col-xs-12 col-md-3 col-lg-2">
                        <div class="working-hours">
                            <p>время работы:
                                <br> с 9.00 до 18.00</p>
                        </div>
                    </div>
                    <!-- end md2 -->
                    <div class="col-xs-12 col-md-3 col-lg-2 ">
                        <div class="top-telephone">
                            <select name="#" id="">
                                <option value="#"><a href="tel:093-000-00-01">093-000-00-01</a></option>
                                <option value="#"><a href="tel:093-000-00-02">093-000-00-02</a></option>
                                <option value="#"><a href="tel:093-000-00-03">093-000-00-03</a></option>
                                <option value="#"><a href="tel:093-000-00-04">093-000-00-04</a></option>
                                <option value="#"><a href="tel:093-000-00-05">093-000-00-05</a></option>
                            </select>
                        </div>
                    </div>
                    <!-- end md-2 -->
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-xs-12 col-md-3">
<!--                    --><?php//= \frontend\widgets\Shop\CatalogMenuWidget::widget() ?>
                    <?= \frontend\widgets\Shop\CatalogMenuWidget::widget() ?>
                    <!-- end .catalog -->
                </div>
                <!-- end md2 -->
                <div class="col-xs-12 col-md-3">
                    <div class="top-search-block">
                        <?= Html::beginForm(['/shop/catalog/search'], 'get') ?>
                            <input type="text" name="text" value="" id="serach-input" placeholder="Что ищете?">
                            <input type="submit" value=" ">
                        <?= Html::endForm() ?>


                        <div class="top-serch-block--result">
                            <div class="serch-row">

                                <div class="col-sm-2">
                                    <div class="top-serch-block--result-img">
                                        <img src="http://placehold.it/40x40" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-5 name-wrp">
                                    <a href="#">Lorem ipsum dolor sit.</a>
                                </div>
                                <div class="col-sm-2 price-wrp">
                                    <span class="price">2.83 грн</span>
                                </div>
                                <div class="col-sm-3 add-wrp">
                                    <a href="#" class="add uppercase">в корзину</a>
                                </div>

                                <div class="clearfix"></div>

                            </div>

                            <div class="serch-row">

                                <div class="col-sm-2">
                                    <div class="top-serch-block--result-img">
                                        <img src="http://placehold.it/40x40" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-5 name-wrp">
                                    <a href="#">Lorem ipsum dolor sit.</a>
                                </div>
                                <div class="col-sm-2 price-wrp">
                                    <span class="price">2.83 грн</span>
                                </div>
                                <div class="col-sm-3 add-wrp">
                                    <a href="#" class="add uppercase">в корзину</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="serch-row">

                                <div class="col-sm-2">
                                    <div class="top-serch-block--result-img">
                                        <img src="http://placehold.it/40x40" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-5 name-wrp">
                                    <a href="#">Lorem ipsum dolor sit.</a>
                                </div>
                                <div class="col-sm-2 price-wrp">
                                    <span class="price">2.83 грн</span>
                                </div>
                                <div class="col-sm-3 add-wrp">
                                    <a href="#" class="add uppercase">в корзину</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="serch-row">

                                <div class="col-sm-2">
                                    <div class="top-serch-block--result-img">
                                        <img src="http://placehold.it/40x40" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-5 name-wrp">
                                    <a href="#">Lorem ipsum dolor sit.</a>
                                </div>
                                <div class="col-sm-2 price-wrp">
                                    <span class="price">2.83 грн</span>
                                </div>
                                <div class="col-sm-3 add-wrp">
                                    <a href="#" class="add uppercase">в корзину</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="serch-row">

                                <div class="col-sm-2">
                                    <div class="top-serch-block--result-img">
                                        <img src="http://placehold.it/40x40" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-5 name-wrp">
                                    <a href="#">Lorem ipsum dolor sit.</a>
                                </div>
                                <div class="col-sm-2 price-wrp">
                                    <span class="price">2.83 грн</span>
                                </div>
                                <div class="col-sm-3 add-wrp">
                                    <a href="#" class="add uppercase">в корзину</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>






                            <p class="all-result"> Все результаты поиска (20)</p>

                        </div>


                    </div>
                </div>
                <!-- end md6 -->
                <div class="col-md-1">
                    <div class="alphabetbtn active"><a class="btn btn-sm btn-yellow" href="javascript:;">А-я</a></div>
                </div>
                <div class="col-xs-12 col-md-5 col-lg-5">
                    <div class="top-action">
                        <div class="authorization" data-toggle="modal" data-target="#authorization_modal">
                            <p><span></span>
                                <i>
                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <a href="#">Войти/регистрация</a>
                                    <?php else: ?>
                                        <a href="<?= Html::encode(Url::to(['/auth/auth/logout'])) ?>" data-method="post">Выход</a>
                                    <?php endif; ?>
                                </i>
                            </p>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="authorization_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <?= \frontend\widgets\auth\LoginWidget::widget() ?>
                                        <p class="or-link"><span>или</span></p>
                                        <?= \frontend\widgets\auth\SocialAuthWidget::widget([
                                            'baseAuthUrl' => ['auth/network/auth']
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <?= \frontend\widgets\Shop\CartWidget::widget() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end top-nav -->
    <div class="mob-menu">
        <div class="menu">
            <button><i class="fa fa-bars fa-2x"></i><span>МЕНЮ</span></button>
            <div class="menu-inner">
                <ul>
                    <li><a href="#">О компании</a></li>
                    <li><a href="#">Корзина</a></li>
                    <li><a href="#">Акции</a></li>
                    <li><a href="#">Войти</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Новости</a></li>
                    <li><a href="#">Оплата и доставка</a></li>
                    <li><a href="#">Помощь</a></li>
                    <li><a href="#">$ Система скидок</a></li>
                </ul>
            </div>
        </div>
        <div class="catalog">
            <button>Каталог</button>
            <div class="catalog-inner">
                <ul>
                    <ul>
                        <li>
                            <a href="#">Бумага и изделия из бумаги</a>
                        </li>
                        <li>
                            <a href="#">Письменные принадлежности</a>
                        </li>
                        <li>
                            <a href="#">Офисные принадлежности</a>
                        </li>
                        <li>
                            <a href="#">Принадлежности для делопроизводства</a>
                        </li>
                        <li>
                            <a href="#">Упаковочные материалы</a>
                        </li>
                        <li>
                            <a href="#">Презентационное оборудование</a>
                        </li>
                        <li>
                            <a href="#">Офисная техника</a>
                        </li>
                        <li>
                            <a href="#">Компьютерная техника</a>
                        </li>
                        <li>
                            <a href="#">Бытовая техника</a>
                        </li>
                        <li>
                            <a href="#">Хозяйственные товары</a>
                        </li>
                        <li>
                            <a href="#">Продовольственные товары</a>
                        </li>
                        <li>
                            <a href="#">Мебель для офиса</a>
                        </li>
                        <li>
                            <a href="#">Деловые подарки</a>
                        </li>
                        <li>
                            <a href="#">Школа и развитие детей NEW</a>
                        </li>
                        <li>
                            <a href="#">Средства защиты</a>
                        </li>
                        <li>
                            <a href="#">Рекламные сувениры NEW</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="search">
            <div class="search-icon"></div>


            <div class="find">
                <form action="">
                    <input class="input_search" type="text" value="" placeholder="Поиск товара" autocomplete="off" style="">
                    <input class="button_search" value="" type="submit">
                    <div class="find__result">
                        <div class="find__item">
                            <img src="http://placehold.it/40x40" alt="">
                            <p class="find__name">РУЧКА SCHNEIDER ESSENTIAL</p>
                        </div>
                        <div class="find__item">
                            <img src="http://placehold.it/40x40" alt="">
                            <p class="find__name">РУЧКА SCHNEIDER ESSENTIAL</p>
                        </div>
                        <div class="find__item">
                            <img src="http://placehold.it/40x40" alt="">
                            <p class="find__name">РУЧКА SCHNEIDER ESSENTIAL</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="cart">
            <div class="cart-icon"></div>
        </div>
    </div>

</header>


<main role="main">
    <?= Alert::widget() ?>
    <?= $content ?>
</main>
<footer role="contentinfo">
    <div id="toTop">
        <img src="/images/system/toTop.png" alt="">
        <p>наверх</p>
    </div>
    <div class="footer_wrp">
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    <ul>
                        <li><a href="#">Время работы Сall-центра</a></li>
                        <li><a href="#"><b>Сервисы</b></a></li>
                        <li><a href="#">Словарь терминов</a></li>
                        <li><a href="#">Карта сайта</a></li>
                    </ul>
                </div>
                <div class="col-md-2">



                    <ul>
                        <li><a href="#"><b>Пользователям</b></a></li>
                        <li><a href="#">Оплата и доставка</a></li>
                        <li><a href="#">Обратная связь</a></li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <ul>
                        <li><a href="#">О компании</a></li>
                        <li><a href="#">Контакты</a></li>
                        <li><a href="#">Список наших ТМ</a></li>
                        <li><a href="#">Важные объявления</a></li>
                        <li><a href="#">новости сети</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul>
                        <li><b>Звоните по номеру:</b></li>
                        <li><a href="tel:(044) 503-71-79">(044) 503-71-79</a></li>
                        <li><a href="tel:(044) 503-71-79">(044) 503-71-79</a></li>
                        <li><a href="tel:(044) 503-71-79">(044) 503-71-79</a></li>
                    </ul>
                </div>
                <div id="fb-root"></div>
                <script type="text/javascript">
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="col-md-4">
                    <div class="pull-left" style="margin-right: 43px;">

                        <img src="/images/system/visa.png" alt="">

                    </div>

                    <p>
                        Присоединяйтесь

                    </p>
                    <div class="fb-page"
                         data-href="https://www.facebook.com/uapapirus/"
                         data-width="380"
                         data-hide-cover="false"
                         data-show-facepile="false"></div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!--light-box styles-->
<!--<link rel="stylesheet" href="https://mreq.github.io/slick-lightbox/gh-pages/bower_components/slick-carousel/slick/slick-theme.css">-->
<!--light-box styles-->
<!-- ADD SCRIPTS -->
<!-- JQuery -->
<!--<script src="libs/jquery/dist/jquery.min.js"></script>-->

<!-- Slick-carousel -->
<!-- <script src="libs/slick-carousel/slick/slick.min.js"></script> -->
<!-- Map Script -->
<!--<script src="libs/jquery-validation/dist/jquery.validate.min.js"></script>-->
<!--<script src="libs/jquery-ui/jquery-ui.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js"></script>-->
<!--<script src="libs/swiper/js/swiper.min.js"></script>-->
<!--<script src="libs/selectric/jquery.selectric.min.js"></script>-->
<!--<script src="libs/jquery.mmenu/jquery.mmenu.all.js"></script>-->

<!--<script src="libs/jQueryFormStyler/dist/jquery.formstyler.js"></script>-->

<!--<script src="libs/star/jquery.raty.min.js"></script>-->
<!--<script src="libs/countdown/jquery.countdown.min.js"></script>-->

<!--<script src="libs/slick-carousel/slick/slick.min.js"></script>-->
<!--<script src="libs/slick_light/slick_lightbox.js"></script>-->

<!--<script src="libs/lightbox2/js/lightbox.js"></script>-->
<!-- Bootstrap -->
<!--<script src="libs/bootstrap/js/bootstrap.min.js"></script>-->
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBMIdjyZmJPMrW7Kq2S9u-xmMIJnrIRMIg&amp;amp;amp;sensor=false"></script> -->
<!-- Common Script -->
<script>
    $('#serach-input').click(function () {
        $(this).toggleClass('act')
        $('.top-serch-block--result').toggleClass('act')
    })
</script>
<!--<script src="js/common.js"></script>-->

<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>