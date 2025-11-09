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
            [
                'attribute' => 'view.title',
                'value' => 'title',
            ],
            [
                'attribute' => 'Прибыль в день',
                'value' => 'profit'
            ]
        ],
    ]) ?>

    <?php Pjax::end(); ?>
    <p>
        <?= Html::a('Экспорт', 'export-fourth', ['class' => 'btn btn-success', 'download' => true]) ?>
    </p>

</div>