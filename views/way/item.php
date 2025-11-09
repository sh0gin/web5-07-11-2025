<?php

use yii\bootstrap5\Html;
?>
<div class="p-3 border m-5">
    <span>Начало: </span>
    <?= $model->start ?><br>
    <span>Конец: </span>
    <?= $model->end ?><br>
    <span>Длина(км): </span>
    <?= $model->length ?><br>

    <?= Html::a("Просмотр", ['way/view', 'id' => $model->id], ['class' => "btn btn-primary mt-2"])?>
</div>