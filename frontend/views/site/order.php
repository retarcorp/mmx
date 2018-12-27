<?php
use frontend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $posts array */

AppAsset::register($this);

?>

<div class="header__bottom light">
    <div class="container">
        <h2>Корзина</h2>
    </div>
</div>
</div>

<div class="wrapper__content">
    <section class="order-form" data-order-form>
        <div class="order-form__modal" data-order-form-modal>
            <h2>Ваша корзина пуста</h2>
        </div>
    </section>

    <section class="cart" style="text-align: center;padding-top: 60px;">
        <div class="container">
            <h2>Ваша заявка принята! Менеджер свяжется с вами в ближайшее время!</h2>
        </div>
    </section>
</div>