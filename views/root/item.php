<?php

use yii\bootstrap5\Html;
?>
<div class="p-3 border m-5">
    <span>Номер маршрута: </span>
    <?= $model->number ?><br>
    <span>Количество транспорта на этом маршруте: </span>
    <?= $model->count_car ?><br>
    <span>Количество остановок: </span>
    <?= $model->count_stop ?><br>
    <span>Количество пассажиров ежедневно: </span>
    <?= $model->count_users ?><br>
    <span>Название: </span>
    <?= $model->view->title ?><br>
    <span>Количество в парке: </span>
    <?= $model->view->count ?><br>
    <span>Цена проезда: </span>
    <?= $model->view->cost ?><br>
    <span>Средняя скорость: </span>
    <?= $model->view->speed_average ?><br>
    <span>Начало: </span>
    <?= $model->way->start ?><br>
    <span>Конец: </span>
    <?= $model->way->end ?><br>
    <span>Длина(км): </span>
    <?= $model->way->length ?><br>

    <?= Html::a("Просмотр", ['/root/view', 'id' => $model->id], ['class' => "btn btn-primary mt-2"])?>
</div>