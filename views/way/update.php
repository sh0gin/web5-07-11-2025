<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\way $model */

$this->title = 'Update Way: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ways', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="way-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
