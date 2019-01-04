<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Конструктор';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constructor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
        <?php $form = ActiveForm::begin([
            'action' => 'create',
            'options' =>
                ['enctype' => 'multipart/form-data']
        ]); ?>


        <?= $form->field($model, 'default_name')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Загрузить файл', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'article',
            'default_name',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>
</div>
