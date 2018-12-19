<?php

/* @var $this \yii\web\View */

/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="header">

        <div class="header__top">
            <div class="container">
                <h1><a href="/">ЩитМ.бел</a></h1>
                <nav class="header__navigation">
                    <ul class="header__navigation-list">
                        <li class="header__navigation-list-item"><a href="/">Главная</a></li>
                        <li class="header__navigation-list-item"><a href="/site/catalogue">Каталог</a></li>
                        <li class="header__navigation-list-item"><a href="/blog">Блог</a></li>
                        <li class="header__navigation-list-item"><a href="#">Контакты</a></li>
                    </ul>
                </nav>
                <div class="header__callback">
                    <p class="header__callback-item number"><a href="tel:+375296500341">+375 (29) 650 03 41</a></p>
                    <button class="header-callback-item default-button"><a href="tel:+375296500341">Заказать звонок</a>
                    </button>
                </div>

                <div class="header__cart">
                    <a href="/site/cart">
                        <div class="header__cart-items">
                            <p class="header__cart-item count">2 позиции</p>
                            <p class="header__cart-item price">186.76</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <?= $content ?>


        <div class="footer">
            <section class="location">
                <div id="google-map" class="location__map"></div>
                <div class="container">
                    <div class="location__feedback">
                        <h3>Связаться с нами</h3>
                        <div class="location__com-data">
                            <p>ООО "Минимакс Электро"</p>
                            <p>УНП 1000000000 от 00.00.2000 г.</p>
                            <p>р/с BY27 BELB 1000 0000 0001 1000 в ОАО "НеБанк" г. Минск, ул. Такая-то, д.0</p>
                        </div>
                        <ul class="location__feedback-list">
                            <li class="location__feedback-list-item pointer">
                                <p>г. Минск, ул. Семенова 35 - 31</p>
                            </li>
                            <li class="location__feedback-list-item mail">
                                <p>mav@minimax.by (отдел продаж)</p>
                                <p>info@minimax.by (для коммерческих предложений)</p>
                            </li>
                            <li class="location__feedback-list-item phone">
                                <p>+375 29 000 00 00 (отдел продаж)</p>
                                <p>+375 44 000 00 00 (отдел покупок)</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </section>

            <div class="footer__bottom-info">
                <div class="container">
                    <p>(с) 2018. ЩитМ.бел. Все права защищены.</p>
                    <p>Размещенные на сайте товарные позиции не являются публичной офертой и представлены в
                        ознакомительных целях. Заказы принимаются по телефону </p>
                    <p>+375 29 000 00 00.</p>
                </div>
            </div>

        </div>

        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
