<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\root $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="root-view">


    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ты уверен что хочешь удалить это?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number',
            'count_car',
            'count_stop',
            'count_users',
            [
                'attribute' => 'Название',
                'value' => $model->view->title,
            ],
            [
                'attribute' => 'Количество в парке',
                'value' => $model->view->count,
            ],
            [
                'attribute' => 'Цена проезда',
                'value' => $model->view->cost,
            ],
            [
                'attribute' => 'Средняя скорость',
                'value' => $model->view->speed_average,
            ],
            [
                'attribute' => 'Начала пути',
                'value' => $model->way->start,
            ],
            [
                'attribute' => 'Конец пути',
                'value' => $model->way->end,
            ],
            [
                'attribute' => 'Расстояние',
                'value' => $model->way->length,
            ],

            
            'way_id',
        ],
    ]) ?>

</div>
