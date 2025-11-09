<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\root $model */

$this->title = 'Обновление маршрута: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="root-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
