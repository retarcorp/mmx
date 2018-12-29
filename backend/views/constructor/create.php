<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Constructor */

$this->title = 'Добавить позицию';
$this->params['breadcrumbs'][] = ['label' => 'Конструктор', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constructor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
