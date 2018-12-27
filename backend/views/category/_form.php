<?php

use common\models\Category;
use kartik\file\FileInput;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->widget(FileInput::class, [
        'options' => [
            'accept' => 'image/*',
        ],
        'pluginOptions' => [
            'initialPreview' => [
                $model->isNewRecord ? false : Html::img(Category::getPathImg($model->img), ['style' => 'height: 160px'])
            ],
            'showUpload' => false,
            'overwriteInitial' => true,
            'maxFileSize' => 2800,
            'allowedFileExtensions' => ['jpg', 'jpeg', 'png'],
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
