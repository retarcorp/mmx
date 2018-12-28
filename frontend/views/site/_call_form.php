<?php

/*@var $model frontend\models\ContactForm*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use common\widgets\Alert;

?>

<div class='content'>
    <h1 class='title'>Заказать звонок</h1>
    <?= Alert::widget() ?>
    <?php $form = ActiveForm::begin([
        'action' => '/site/send-call',
        'options' => [
            'data-pjax' => true,
            'class'=> 'call-form'
        ]
    ]) ?>

    <?= $form->field($model, 'name')->textInput([
        'placeholder' => $model->getAttributeLabel('name')
    ])->label(false) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'mask' => [
            '+375 99 999 99 99',
            '80 99 999 99 99'
        ],
        'options' => [
            'placeholder' => $model->getAttributeLabel('phone'),
            'class'=> 'form-control'
        ]
    ])->label(false) ?>

    <?= Html::submitButton('Отправить', ['class' => 'default-button bottom-border']) ?>

    <?php ActiveForm::end() ?>
</div>