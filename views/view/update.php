<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\view $model */

$this->title = 'Update View: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="view-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
