<?php

use common\models\Category;
use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $posts Category */

AppAsset::register($this);
$this->title = 'Каталог';
?>

<div class="header__bottom light">
    <div class="container">
        <h2>Каталог продукции</h2>
    </div>
</div>
</div>

<div class="wrapper__content">
    <div class="catalogue">
        <div class="container">
            <ul class="catalogue__list">
                <?php foreach ($posts as $post) { ?>
                    <li class="catalogue__list-item products">
                        <a href="#">
                            <div class="catalogue__item-image">
                                <?= Html::img(Category::getPathImg($post->img)) ?>
                            </div>
                            <h3><?= $post->title ?></h3>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
