<?php

use yii\bootstrap5\Html;
?>
<div class="p-3 border m-5">
    <span>Название: </span>
    <?= $model->title ?><br>
    <span>Количество в парке: </span>
    <?= $model->count ?><br>
    <span>Цена проезда: </span>
    <?= $model->cost ?><br>
    <span>Средняя скорость: </span>
    <?= $model->speed_average ?><br>

    <?= Html::a("Просмотр", ['view/view', 'id' => $model->id], ['class' => "btn btn-primary mt-2"])?>
</div>