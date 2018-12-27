<?php

use common\models\Products;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'code',
            'vendor_code',
            'product_name:ntext',
            'unit',
            'manufacturer',
            'price',
            'availability',
            'delivery_time',
            'assembly_time',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'filter' => Html::activeDropDownList($searchModel, 'status', [
                    Products::STATUS_NONACTIVE => 'Нет',
                    Products::STATUS_ACTIVE => 'Да'
                ], ['class' => 'form-control', 'prompt' => 'Все']),
                'value' => function ($model) {
                    $active = $model->status == Products::STATUS_ACTIVE;
                    return Html::tag(
                        'span',
                        $active === false ? 'Нет' : 'Да',
                        [
                            'class' => 'label span-active label-' . ($active === false ? 'danger' : 'success'),
                        ]
                    );
                },

            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}'
            ],
        ],
    ]); ?>
</div>
