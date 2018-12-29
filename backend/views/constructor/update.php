<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Constructor */

$this->title = 'Обновить позицию: ' . $model->vendor_code;
$this->params['breadcrumbs'][] = ['label' => 'Конструктор', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Конструктор';
?>
<div class="constructor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

</div>
