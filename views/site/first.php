<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\rootSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Маршруты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="root-index">



    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'start',
            'end',
            'length',
            [
                'attribute' => 'Время',
                'value' => 'time'
            ]            
        ],
    ]) ?>

    <p>
        <?= Html::a('Экспорт', 'export-first', ['class' => 'btn btn-success', 'download' => true]) ?>
    </p>
    <?php Pjax::end(); ?>

</div>