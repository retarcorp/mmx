<?php

use frontend\assets\AppAsset;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
AppAsset::register($this);
?>

<div class="header__bottom">
    <div class="container">

        <div class="header__bottom-text">
            <h2 class="header__bottom-title">
                Распределительные устройства -
                моментальный монтаж и перенос
                электросетей
            </h2>
            <ul class="header__bottom-list">
                <li class="header__bottom-list-item">Европейское качество материалов</li>
                <li class="header__bottom-list-item">Соответствие государственным стандартам безопасности</li>
                <li class="header__bottom-list-item">Индивидуальная комплектация и конфигурация устройства для любых
                    целей
                </li>
                <li class="header__bottom-list-item">Экономия до 30% на затратах на сборку электросетей</li>
                <li class="header__bottom-list-item">Развертывание электросетей меньше, чем за час</li>
            </ul>
        </div>

        <div class="header__bottom-form">
            <div class="call-form">
                <div class="call-form__content">
                    <h3>Запросить сборку устройства</h3>
                    <?php Pjax::begin(['enablePushState' => false, 'timeout' => false]) ?>
                    <?= $this->render('_contact_form', ['model' => $model]) ?>
                    <?php Pjax::end() ?>
                    <p class="call-form__note">Оставьте заявку, и наши специалисты перезвонят Вам и подберут для Вас
                        распределительное устройство с оптимальными характеристиками.</p>

                    <div class="call-form__advertise">
                        <p class="call-form__advertise-text">В нашем каталоге более 300 моделей распределительных
                            устройств!</p>
                        <button class="default-button color"><a href="/site/catalogue">Открыть каталог</a></button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>

<div class="wrapper__content">
    <section class="about-it">
        <div class="container">
            <div class="about-it__float-window">
                <div class="abouit-it__image">
                    <img src="/img/sections/about-it.png">
                </div>

                <div class="about-it__description">
                    <h3>Что такое распределительные устройства?</h3>
                    <div class="about-it__text-box">
                        <p>Распределительным устройством называется специальная коробка, в которую встроены розетки и
                            переключатели с требуемыми вольт-амперными характеристиками. Такие коробки могут начиняться
                            совершенно любым набором розеток и переключателей, а также иметь выходы в любую сторону от
                            основания коробки.</p>
                        <p>Распределительные устройства позволяют в одном месте безопасным,
                            проверенным и сертифицированным способом собрать все требуемые для
                            электросети компоненты. Монтаж, демонтаж и перенос такого устройства
                            занимает не более часа, снятое устройство можно использовать повторно.</p>
                        <p>Мы собираем распределительные устройства индивидуально для каждого клиента
                            - с требуемой комплектацией и конфигурацией розеток. Такое решение
                            позволяет быстро, эффективно и безопасно организовать электросеть для любых
                            потребностей - производственный цех, выездное мероприятие, монтаж
                            освещения для сцен и так далее.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="varanties">
        <div class="container">
            <h2>Используя распределительные устройства в электросетях, Вы гарантируете себе:</h2>
            <div class="varanties__content">
                <ul class="varanties__list">
                    <li class="varanties__list-item star">
                        <h4>Европейский стандарт работ</h4>
                        <p>Использование РУ - стандарт де факто в Европе
                            для построения всех электрических сетей любого уровня
                            и размера.</p>
                    </li>
                    <li class="varanties__list-item economy">
                        <h4>Экономию до 30-50% средств</h4>
                        <p>Минимизация затрат по времени и сборке сети дает
                            возможность сэкономить существенное количество ресурсов при
                            монтаже электросети.</p>
                    </li>
                    <li class="varanties__list-item individual">
                        <h4>Индивидуальное решение для сети</h4>
                        <p>РУ могут быть собраны с любой конфигурацией и
                            расположением базовых элементов сети, что дает
                            возможность разработать индивидуальное устройство для
                            любого помещения и потребности.</p>
                    </li>
                    <li class="varanties__list-item protected">
                        <h4>Безопасность сотрудников и электросети</h4>
                        <p>Сбои в работе распределительного устройства влияют только на
                            элементы сети, подключенные непосредственно к нему, и не влияют
                            на всю электросистему (например, всего предприятия). Работа с
                            распределительными устройствами абсолютно безопасна для
                            специалистов по монтажу.</p>
                    </li>
                    <li class="varanties__list-item fast">
                        <h4>Высокая скорость монтажа</h4>
                        <p>Снять/повесить коробку распределительного устройства и
                            подключить все необходимые элементы - задача менее чем
                            на полчаса для специалиста по электромонтажу. Буквально
                            за час электросистема может быть полностью возведена.</p>
                    </li>
                    <li class="varanties__list-item calendar">
                        <h4>Срок эксплуатации - до 10 лет</h4>
                        <p>Распределительные устройства - несложный, но стабильный механизм
                            и будет использоваться на протяжении долгого времени в одной или в
                            разных электросетях.</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="popular">
        <div class="container">
            <h2>Популярное в каталоге</h2>
            <ul class="popular__slick slick-container">
                <?php foreach ($products as $product) { ?>
                    <li class="popular__slick-item">
                        <div class="popular__slick-item-content">
                            <h4>Арт. <?= $product['vendor_code'] ?></h4>
                            <div class="popular__image">
                                <?php if (!file_exists(Yii::getAlias('@frontend') . '/uploads/1C' . $product['img'])) { ?>
                                    <img src="/img/sections/popular-product-1.png">
                                <?php } else { ?>
                                    <img src="/uploads/1C/" .<?= $product['img'] ?>
                                <?php } ?>
                            </div>
                            <div class="popular__product-description">
                                <?= $product['product_name'] ?>
                            </div>
                            <div class="popular__options">
                                <input type="hidden" value="<?= $product['id'] ?>">
                                <p>
                                    <span class="price"><?= $product['price'] ?></span>
                                    <span class="currency">руб.</span>
                                </p>
                                <button class="default-button color cart-button"><a href="#">В корзину</a></button>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="popular__section-options">
            <button class="default-button color"><a href="#">Открыть весь каталог</a></button>
        </div>
    </section>

    <section class="about-self">
        <div class="container">
            <div class="about-self__content">
                <h2>Сборка РУ в Минимакс Электро</h2>
                <div class="about-self__introduction">
                    <p>Наша компания занимается индивидуальной сборкой распределительных
                        устройств в количествах от 1 шт. Работая с нами, вы получаете:</p>
                    <ul class="about-self__list">
                        <li class="about-self__list-item">
                            <div class="about-self__list-item-image">
                                <img src="/img/icons/about-self-star.png">
                            </div>
                            <p>Только европейские
                                комплектующие для
                                РУ</p>
                        </li>
                        <li class="about-self__list-item">
                            <div class="about-self__list-item-image">
                                <img src="/img/icons/about-self-watch.png">
                            </div>
                            <p>Сборку заказа за
                                1-3 дня</p>
                        </li>
                        <li class="about-self__list-item">
                            <div class="about-self__list-item-image">
                                <img src="/img/icons/about-self-coins.png">
                            </div>
                            <p>Стоимость в среднем
                                в 2 раза ниже по
                                рынку</p>
                        </li>
                        <li class="about-self__list-item">
                            <div class="about-self__list-item-image">
                                <img src="/img/icons/about-self-settings.png">
                            </div>
                            <p>Любую
                                комплектацию и
                                конфигурацию РУ</p>
                        </li>
                        <li class="about-self__list-item">
                            <div class="about-self__list-item-image">
                                <img src="/img/icons/about-self-calendar.png">
                            </div>
                            <p>Рассрочку платежа
                                для крупных заказов</p>
                        </li>
                    </ul>
                </div>

                <p>В нашем каталоге - более 300 моделей различных распределительных устройств -
                    подберите оптимальное РУ для своей задачи: <a href="#">Перейти в каталог</a></p>
                <p>Воспользуйтесь нашим онлайн-конструктором для подбора и расчета стоимости
                    распределительного устройства под Ваши конкретные нужды: <a href="#">Открыть конструктор</a></p>
                <p>Оставьте заявку, наш менеджер свяжется с Вами и поможет подобрать
                    распределительное устройство, оптимальное по цене и конфигурации для Вашей
                    потребности: <a href="#">Заказать звонок</a></p>
            </div>
        </div>

    </section>
</div>