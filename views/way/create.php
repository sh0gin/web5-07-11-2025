<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\way $model */

$this->title = 'Create Way';
$this->params['breadcrumbs'][] = ['label' => 'Ways', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="way-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
