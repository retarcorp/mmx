<?php

use common\models\Articles;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'class' => 'table table-striped table-bordered atricles-table'
        ],
        'filterModel' => $searchModel,
        'columns' => [
            [
                'format' => 'raw',
                'attribute' => 'title'
            ],
            [
                'format' => 'raw',
                'attribute' => 'article'
            ],
            [
                'attribute' => 'img',
                'format' => 'raw',
                'filter' => false,
                'value' => function ($model) {
                    return Html::img(Articles::getPathImg($model->img), ['style' => 'height: 160px']);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}'
            ],
        ],
    ]); ?>
</div>
