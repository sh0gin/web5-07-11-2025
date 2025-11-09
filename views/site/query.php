<?php

use yii\bootstrap5\Html;

echo Html::a('Оптимальный по времени маршрут между двум задаными пунктами', ['site/first'], ["class" => ['btn btn-primary m-3']]); 
echo Html::a('Среднее время ожидания на остановке троллейбуса с заданным номером', ['site/second'], ["class" => ['btn btn-primary m-3']]);
echo Html::a('Маршруты трамваев в порядке убывания их протяженности', ['site/third'], ["class" => ['btn btn-primary m-3']]); 
echo Html::a('Список ежедневных поступлений для всех видов транспорта', ['site/fourth'], ["class" => ['btn btn-primary ']]);

?>