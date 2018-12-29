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

    <?php
    if (empty($model->sockets)) { ?>
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
    <?php } else {
        foreach ($model->sockets as $item) {
            ?>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'socket[]')->dropDownList(
                        ArrayHelper::map(Socket::find()->distinct()->asArray()->all(), 'id', 'title'),
                        [
                            'prompt' => 'Выберите розетку',
                            'options' => [
                                $item->id => ['selected' => true]
                            ]
                        ]
                    ) ?>
                </div>

                <?php foreach ($model->socket2Constructors as $socket2Constructor) {
                    if ($item->id === $socket2Constructor->socket_id &&
                        $model->id === $socket2Constructor->constructor_id) {
                        ?>
                        <div class="col-md-2">
                            <?= $form->field($model, 'socketCount[]')->input('number', ['min' => 1,
                                'value' => $socket2Constructor->count]) ?>
                        </div>
                    <?php } ?>
                <?php } ?>

                <div class="col-md-2" style="margin-top: 25px">
                    <?= Html::button('Удалить', ['class' => 'btn btn-danger deleteSocket']) ?>
                </div>
            </div>
        <?php }
    } ?>

    <div class="row finally">
        <div class="col-md-2 form-group">
            <?= Html::button('Добавить розетку', ['class' => 'btn btn-default', 'id' => 'addSocket']) ?>
        </div>
    </div>

    <div class="row">

        <?php
        $protected = ProtectedTable::find()->asArray()->all();
        foreach ($protected as $item) {
            $checked = false;
            foreach ($model->protected2Constructors as $value) {
                if ($value->constructor_id === $model->id && $item['id'] == $value->protected_id) {
                    $checked = true;
                }
            }
            ?>
            <div class="col-md-12">
                <?= $form->field($model, "protectedName[{$item['id']}]")->checkbox(['label' => $item['name'], 'checked' => $checked])->label(false) ?>
            </div>
        <?php } ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Обновить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
