<?php

use common\models\Constructor;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Конструтор';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constructor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить позицию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'vendor_code',
            [
                'attribute' => 'category',
                'value' => function ($model) {
                    return Constructor::CATEGORY_ARRAY[$model->category];
                }
            ],
            [
                'attribute' => 'socket',
                'format' => 'raw',
                'value' => function ($model) {
                    $result = '';
                    foreach ($model->sockets as $item) {
                        foreach ($model->socket2Constructors as $socket2Constructor) {
                            if ($item->id === $socket2Constructor->socket_id &&
                                $model->id === $socket2Constructor->constructor_id) {
                                $result .= "{$item->title} - $socket2Constructor->count шт.\n";
                            }
                        }

                    }
                    return $result;
                }
            ],
            [
                'attribute' => 'protectedName',
                'format' => 'raw',
                'value' => function ($model) {
                    $result = '';
                    foreach ($model->protected as $item) {
                        foreach ($model->protected2Constructors as $protected2Constructor) {
                            if ($item->id === $protected2Constructor->protected_id &&
                                $model->id === $protected2Constructor->constructor_id) {
                                $result .= "{$item->name}\n";
                            }
                        }
                    }
                    return $result;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>
