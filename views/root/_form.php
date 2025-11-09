<?php

use app\models\View;
use app\models\Way;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\root $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="root-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'count_car')->textInput() ?>

    <?= $form->field($model, 'count_stop')->textInput() ?>

    <?= $form->field($model, 'count_users')->textInput() ?>

    <?= $form->field($model, 'view_id')->dropDownList(View::find()->select('title')->indexBy('id')->column(), ['pattern' => 'Выбери направление']) ?>

    <?= $form->field($model, 'way_id')->dropDownList(Way::find()->select(["start"])->indexBy('id')->column(), ['pattern' => 'Выбери направление']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
