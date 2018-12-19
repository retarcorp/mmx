<?php

use common\models\Articles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $posts Articles */
/* @var $pages \yii\data\Pagination */

$this->title = 'Блог';

?>

<div class="header__bottom light">
    <div class="container">
        <h2>Полезные материалы</h2>
    </div>
</div>
</div>

<div class="wrapper__content">
    <section class="catalogue">
        <div class="container">
            <ul class="catalogue__list">
                <?php foreach ($posts as $post) {
                    ?>
                    <li class="catalogue__list-item article">

                        <div class="blog-item__image">
                            <?= Html::img(Articles::getPathImg($post->img)) ?>
                        </div>

                        <div class="blog-item__short-description">
                            <h3><?= $post->title ?></h3>
                            <div class="blog-item__short-article">
                                <?= $post->article ?>
                            </div>
                            <?= Html::a('Читать полностью..', [
                                Url::toRoute(['site/article', 'id' => $post->id])
                            ], ['class' => 'default-link'])
                            ?>
                        </div>
                    </li>
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
