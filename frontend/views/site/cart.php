<?php

/* @var $this yii\web\View */

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
                <p class="order-form__details">Заказ оборудования на общую сумму 673 руб.</p>

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
                <tr class="cart__table-content">
                    <td class="cart__table-articul">
                        <div class="cart__table-product">
                            <div class="cart__product-image">
                                <img src="/img/sections/popular-product-1.png">
                            </div>
                            <h3>Арт. №189489</h3>
                        </div>
                    </td>
                    <td class="cart__product-specisication"><p>Розеток 220В: 1, Розеток 380В: 4, Розеток без вольт: 1,
                            Размеры: 40Х150Х330, Масса в собранном состоянии: 1.4 кг, Страна происхождения
                            комплектующих: Германия</p></td>
                    <td class="cart__product-price">117 руб.</td>
                    <td class="cart__product-amount">4</td>
                    <td class="cart__product-total">468 руб.</td>
                </tr>
                <tr class="cart__table-content">
                    <td>
                        <div class="cart__table-product">
                            <div class="cart__product-image">
                                <img src="/img/sections/popular-product-1.png">
                            </div>
                            <h3>Арт. №189489</h3>
                        </div>
                    </td>
                    <td class="cart__product-specisication"><p>Розеток 220В: 1, Розеток 380В: 4, Розеток без вольт: 1,
                            Размеры: 40Х150Х330, Масса в собранном состоянии: 1.4 кг, Страна происхождения
                            комплектующих: Германия</p></td>
                    <td class="cart__product-price">225 руб.</td>
                    <td class="cart__product-amount">1</td>
                    <td class="cart__product-total">225 руб.</td>
                </tr>
            </table>

            <div class="cart__order">
                <p class="cart__order-total">Итого: <span class="cart__order-price">673 руб.</span></p>
                <button class="default-button" data-open-order-form>Отправить заявку</button>
                <p class="cart__order-note">Отправка заявки не является фактом оформления заказа. Для оформления заказа
                    наш менеджер перезвонит Вам и уточнит все детали.</p>
            </div>
        </div>
    </section>
</div>