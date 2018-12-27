<?php

use common\models\Products;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $posts Products */
/* @var $pages \yii\data\Pagination */

?>


    <div class="header__bottom light">
        <div class="container">
            <h2>Распределительные устройства категория 1</h2>
        </div>
    </div>
    </div>

    <div class="wrapper__content">
        <section class="catalogue">
            <div class="container">
                <ul class="catalogue__list">
                    <?php foreach ($posts as $post) {
                        ?>
                        <a href="<?= Url::to(['site/position', 'id' => $post->id]) ?>">
                            <li class="catalogue__list-item category">
                                <div class="popular__image">
                                    <?php
                                    $path = Yii::getAlias('@frontend') . '/web/uploads/' . Products::FOLDER_1C . '/' . $post->img_title . '/';
                                    foreach (glob($path . "*.{jpg,png,gif}", GLOB_BRACE) as $filename) {
                                        $img = str_replace(Yii::getAlias('@frontend') . '/web', '', $filename);
                                        ?>
                                        <div>
                                            <img src="<?= $img ?>">
                                        </div>
                                    <?php } ?>
                                </div>
                                <h3><?= "Арт. {$post->vendor_code}" ?></h3>
                                <div class="popular__product-description">
                                    <?= $post->product_name ?>
                                </div>
                                <div class="popular__options">
                                    <input type="hidden" value="<?= $post->id?>">
                                    <p> <span class="price"><?= $post->price ?></span> <span class="currency">руб.</span></p>
                                    <button class="default-button color cart-button"><a href="#">В корзину</a></button>
                                </div>
                            </li>
                        </a>
                    <?php } ?>
                </ul>

                <div class="catalogue__pages">
                    <?= LinkPager::widget([
                        'pagination' => $pages,
                        'options' => [
                            'class' => 'catalogue__pages-list'
                        ],
                        'prevPageLabel' => false,
                        'nextPageLabel' => false,
                        'linkContainerOptions' => [
                            'class' => 'catalogue__pages-list-item'
                        ]
                    ]); ?>
                </div>
            </div>
        </section>
    </div>

<?php
$script = <<< JS
   $('.popular__image').slick({
        lazyLoad: 'ondemand',
        infinite: true,
        arrows : false,
    });
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>