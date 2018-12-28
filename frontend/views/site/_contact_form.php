<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/*@var $model \frontend\models\ContactForm */
?>

<?php $form = ActiveForm::begin([
    'action' => '/site/send-phone',
    'options' => [
        'tags' => false,
        'class' => 'call-form__form',
        'data-pjax' => true
    ]
]) ?>

<?= $form->field($model, 'phone')->widget(MaskedInput::class, [
    'mask' => [
        '+375 99 999 99 99',
        '80 99 999 99 99'
    ],
    'options' => [
        'placeholder' => $model->getAttributeLabel('phone')
    ]
])->label(false) ?>

<?= Html::submitButton('Отправить', ['class' => 'default-button bottom-border']) ?>

<?php ActiveForm::end() ?>

<?= Alert::widget() ?>
