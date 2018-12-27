<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $posts array */

$this->title = 'Корзина';

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
            <form class="order-form__form">
                <h2>Оформление заявки</h2>
                <p class="order-form__details">Заказ оборудования на общую сумму <?= $sum ?> руб.</p>

                <div class="order-form__credentials">
                    <div class="order-form__input">
                        <span class="order-form__input-title">Ваше имя</span><input type="text">
                    </div>
                    <div class="order-form__input">
                        <span class="order-form__input-title">Ваш телефон</span><input type="text">
                    </div>
                </div>

                <div class="order-form__submit">
                    <button class="default-button">Подтвердить</button>
                    <span class="order-form__submit-note">Ваша заявка будет отправлена нашему менеджеру и он свяжется с Вами в ближайшее время для офрмления заказа</span>
                </div>

                <div class="order-form__close" data-close-order-form></div>
            </form>
        </div>
    </section>

    <section class="cart">
        <div class="container">
            <table class="cart__table">
                <tr class="cart__table-head">
                    <td class="text-center">Артикул</td>
                    <td>Наименование</td>
                    <td>Цена</td>
                    <td>Кол-во</td>
                    <td>Итого</td>
                </tr>
                <?php foreach ($posts as $post) {
                    ?>
                    <tr class="cart__table-content">
                        <td class="cart__table-articul">
                            <div class="cart__table-product">
                                <div class="cart__product-image">
                                    <img src="/img/sections/popular-product-1.png">
                                </div>
                                <h3>Арт. <?= $post['product']->vendor_code ?></h3>
                            </div>
                        </td>
                        <td class="cart__product-specisication"><p>
                                <?= $post['product']->product_name ?>,
                                Размеры: <?= $post['product']->unit ?>,
                                Страна происхождения
                                комплектующих: <?= $post['product']->manufacturer ?></p></td>
                        <td class="cart__product-price"><?= $post['product']->price ?></td>
                        <td class="cart__product-amount"><?= $post[0] ?></td>
                        <td class="cart__product-total"><?= $post['product']->price * $post[0] ?> руб.</td>
                    </tr>
                <?php } ?>
            </table>

            <div class="cart__order">
                <?php $form = ActiveForm::begin([
                    'id' => 'orderForm',
                    'action' => 'order'
                ]) ?>

                <?= $form->field($model, 'name')->textInput(['placeholder'=> 'Ваше имя'])->label(false)?>

                <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
                    'mask' => [
                        '+375 99 999 99 99',
                        '80 99 999 99 99'
                    ],
                    'options' => [
                        'placeholder' => $model->getAttributeLabel('phone'),
                        'class'=> 'form-control'
                    ]
                ])->label(false) ?>
                <?php foreach ($posts as $post) {
                    echo $form->field($model, 'id['.$post['product']->id.']')->hiddenInput(['value' => $post[0]])->label(false);
                } ?>
                <p class="cart__order-total">Итого: <span class="cart__order-price"><?= $sum ?> руб.</span></p>
                <?= Html::submitButton('Отправить заявку', ['class' => 'default-button']) ?>
                <p class="cart__order-note">Отправка заявки не является фактом оформления заказа. Для оформления заказа
                    наш менеджер перезвонит Вам и уточнит все детали.</p>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>
</div>