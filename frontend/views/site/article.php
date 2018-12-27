<?php

use frontend\assets\AppAsset;

/* @var $article \common\models\Articles */
/* @var $this yii\web\View */

AppAsset::register($this);
$this->title = Yii::$app->name;
?>

<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>

<div class="header__bottom light">

</div>
</div>

<div class="wrapper__content">
    <section class="article">
        <div class="container">
            <div class="article__content">
                <h2><?= $article->title ?></h2>
                <div>
                    <?= $article->article ?>
                </div>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"></div>
            </div>
        </div>
    </section>
</div>
