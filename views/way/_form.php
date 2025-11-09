<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\way $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="way-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
