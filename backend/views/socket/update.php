<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Socket */

$this->title = 'Изменить розетку: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Розетки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="socket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
