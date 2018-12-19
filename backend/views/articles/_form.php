<?php

use common\models\Articles;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standart',
            'language' => 'ru',
            'height' => 200
        ],
    ]) ?>

    <?= $form->field($model, 'img')->widget(FileInput::class, [
        'options' => [
            'accept' => 'image/*',
            'value' => $model->img,
        ],
        'pluginOptions' => [
            'initialPreview' => [
                Html::img(Articles::getPathImg($model->img), ['style' => 'height: 160px'])
            ],
            'showUpload' => false,
            'overwriteInitial' => true,
            'maxFileSize' => 2800
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
