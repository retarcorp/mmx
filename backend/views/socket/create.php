<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Socket */

$this->title = 'Добавить розетку';
$this->params['breadcrumbs'][] = ['label' => 'Розетки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
