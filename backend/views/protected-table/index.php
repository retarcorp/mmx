<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProtectedTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Защиты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protected-table-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить защиту', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',

            [
                'class' => 'yii\grid\ActionColumn',
                "template" => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
