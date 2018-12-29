<?php

use frontend\assets\AppAsset;

/* @var $category \common\models\Constructor */
/* @var $sockets \common\models\Socket */
/* @var $protected \common\models\ProtectedTable */

AppAsset::register($this);
?>


<div class="header__bottom light">
    <div class="container">
        <h2>Конструктор распределительного устройства</h2>
    </div>
</div>
</div>

<div class="wrapper__content">
    <section class="constructor">
        <div class="container">
            <div class="constructor__configuration">
                <p class="constructor__introduction">В этом разделе Вы можете подобрать и подсчитать стоимость
                    устройства, оптимально подходящего под Ваши потребности. Заказать такое устройство Вы модете в этом
                    разделе или проконсультироваться у нашего менеджера.</p>
                <div class="constructor__stage">
                    <h3>Шаг 1. Формфактор устройства</h3>
                    <ul class="constructor__form-factor-list">

                        <?php foreach ($category as $key => $item) {
                            ?>
                            <li class="constructor__form-factor-item">
                                <div class="constructor__form-factor-image">
                                    <img src="/img/sections/about-it.png">
                                </div>
                                <input type="hidden" class="category" value="<?= $key ?>"
                                       name="ConstructorProduct[category]">
                                <h4><?= $item ?></h4>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="constructor__stage">
                    <h3>Шаг 2. Розетки в устройстве</h3>
                    <div class="constructor__spoiler active">
                        <h4>Schuko</h4>
                        <div class="constructor__spoiler-content">
                            <?php foreach ($sockets as $socket) {
                                ?>
                                <div class="constructor__amount">
                                    <span class="constructor__change-amount minus" data-amount-minus></span>
                                    <input class="constructor__amount-input" value="0" type="text">
                                    <input class="socket" value="<?= $socket['id'] ?>" type="hidden" name="ConstructorProduct[socket][]>
                                    <span class="constructor__change-amount plus" data-amount-plus></span>
                                    <span class="constructor__amount-description"><?= $socket['title'] ?></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--   <div class="constructor__spoiler">
                           <h4>Общепромышленные</h4>
                           <div class="constructor__spoiler-content">
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 220В стандартная</span>
                               </div>
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 380В стандартная</span>
                               </div>
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 380В стандартная</span>
                               </div>
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 380В стандартная</span>
                               </div>
                           </div>
                       </div>
                       <div class="constructor__spoiler">
                           <h4>Низковольтные</h4>
                           <div class="constructor__spoiler-content">
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 220В стандартная</span>
                               </div>
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 380В стандартная</span>
                               </div>
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 380В стандартная</span>
                               </div>
                               <div class="constructor__amount">
                                   <span class="constructor__change-amount minus" data-amount-minus></span>
                                   <input class="constructor__amount-input" value="0" type="text">
                                   <span class="constructor__change-amount plus" data-amount-plus></span>
                                   <span class="constructor__amount-description">Розетка 380В стандартная</span>
                               </div>
                           </div>
                       </div>-->
                </div>

                <div class="constructor__stage">
                    <h3>Шаг 3. Защита</h3>
                    <ul class="constructor__security-list">
                        <?php foreach ($protected as $item) { ?>
                            <li class="constructor__security-list-item">
                                <input type="hidden" value="<?= $item['id'] ?>" name="ConstructorProduct[protected][]">
                                <span><?= $item['name'] ?></span>
                            </li>
                        <?php } ?>
                        <li class="constructor__security-list-item">
                            <span>Свой вариант защиты: </span>
                            <input type="text">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="constructor__calculator">
                <div class="constructor__calculator-description">
                    <h4>Конфигурация</h4>
                    <ul class="constructor__calculator-list">
                        <li class="constructor__calculator-list-item">
                            <p>Формфактор: стационарное из стеклопластика</p>
                        </li>
                        <li class="constructor__calculator-list-item">
                            <p>Розетки Schuko 220V: 4</p>
                        </li>
                        <li class="constructor__calculator-list-item">
                            <p>Розетки общепромышленные 380V: 3</p>
                        </li>
                        <li class="constructor__calculator-list-item">
                            <p>Розетки низковольтные 12V: 4</p>
                        </li>
                        <li class="constructor__calculator-list-item">
                            <p>Защита: автоматические выключатели</p>
                        </li>
                    </ul>
                </div>

                <div class="constructor__optimal">
                    <h4>Оптимальный вариант</h4>
                    <div class="constructor__optimal-image">
                        <img src="/img/sections/popular-product-1.png">
                    </div>
                    <p class="constructor__optimal-sign">Арт. № 899374</p>
                </div>

                <div class="constructor__order">
                    <h4>Стоимость сборки</h4>
                    <div class="constructor__order-issue">
                        <span class="price">338 руб.</span>
                        <button class="default-button">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
