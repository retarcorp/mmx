<?php

use common\models\Constructor;
use common\models\ProtectedTable;
use common\models\Socket;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Constructor */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="constructor-form">

    <?php $form = ActiveForm::begin([
        'id' => 'constructorForm'
    ]); ?>

    <div class="row finally">
        <div class="col-md-4">
            <?= $form->field($model, 'vendor_code')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'category')->dropDownList(Constructor::CATEGORY_ARRAY) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'socket[]')->dropDownList(
                ArrayHelper::map(Socket::find()->distinct()->asArray()->all(), 'id', 'title'),
                ['prompt' => 'Выберите розетку']
            ) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'socketCount[]')->input('number', ['min' => 1]) ?>
        </div>


        <div class="col-md-2" style="margin-top: 25px">
            <?= Html::button('Удалить', ['class' => 'btn btn-danger deleteSocket']) ?>
        </div>

    </div>

    <div class="row finally">
        <div class="col-md-2 form-group">
            <?= Html::button('Добавить розетку', ['class' => 'btn btn-default', 'id' => 'addSocket']) ?>
        </div>
    </div>

    <div class="row">

        <?php
        $protected = ProtectedTable::find()->asArray()->all();
        foreach ($protected as $item) {
            ?>
            <div class="col-md-12">
                <?= $form->field($model, "protectedName[{$item['id']}]")->checkbox(['label' => $item['name']])->label(false) ?>
            </div>
        <?php } ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
