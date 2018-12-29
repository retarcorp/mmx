<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProtectedTable */

$this->title = 'Добавить защиту';
$this->params['breadcrumbs'][] = ['label' => 'Защиты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protected-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
