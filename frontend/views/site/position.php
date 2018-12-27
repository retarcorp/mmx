<?php

use common\models\Products;
use frontend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $post Products */

AppAsset::register($this);

$path = Yii::getAlias('@frontend') . '/web/uploads/' . Products::FOLDER_1C . '/' . $post->img_title . '/';
?>


    <div class="wrapper__content">
        <section class="position">
            <div class="container">
                <a class="backward-link" href="catalogue">Назад к списку позиций</a>
                <div class="position__content">
                    <div class="position__image slider">
                        <?php
                        $path = Yii::getAlias('@frontend') . '/web/uploads/' . Products::FOLDER_1C . '/' . $post->img_title . '/';
                        if (!file_exists(Yii::getAlias('@frontend') . '/web/' . $path)) { ?>
                            <div>
                                <img src="/img/sections/popular-product-1.png">
                            </div>
                        <?php } else {
                            foreach (glob($path . "*.{jpg,png,gif}", GLOB_BRACE) as $filename) {
                                $img = str_replace(Yii::getAlias('@frontend') . '/web', '', $filename); ?>
                                <div>
                                    <img src="<?= $img ?>">
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="position__description">
                        <h3><?= "Арт. {$post->vendor_code}" ?></h3>
                        <div class="position__cart-options">
                            <span class="price"><span><?= $post->price ?></span> руб.</span>
                            <input class="amount" type="number" value="0" min="0">
                            <input type="hidden" value="<?= $post->id ?>">
                            <button class="default-button color cart-button">В корзину</button>
                        </div>

                        <div class="position__specification">
                            <h4>Характеристики:</h4>
                            <p><?= $post->product_name ?></p>
                            <p>Производитель: <?= $post->manufacturer ?></p>
                            <p>Единица измерения: <?= $post->unit ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
$script = <<< JS
   $('.position__image').slick({
        lazyLoad: 'ondemand',
        infinite: true
    });
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>