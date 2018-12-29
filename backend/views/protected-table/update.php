<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProtectedTable */

$this->title = 'Обновить защиту: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Защиты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="protected-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
