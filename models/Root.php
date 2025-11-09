<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "root".
 *
 * @property int $id
 * @property int $number
 * @property int $count_car
 * @property int $count_stop
 * @property int $count_users
 * @property int $view_id
 * @property int $way_id
 *
 * @property View $view
 * @property Way $way
 */
class Root extends \yii\db\ActiveRecord
{
    public $minuts;
    public $start;
    public $end;
    public $length;
    public $profit;
    public $title;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'root';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'count_car', 'count_stop', 'count_users', 'view_id', 'way_id'], 'required'],
            [['number', 'count_car', 'count_stop', 'count_users', 'view_id', 'way_id'], 'integer'],
            [['way_id'], 'exist', 'skipOnError' => true, 'targetClass' => Way::class, 'targetAttribute' => ['way_id' => 'id']],
            [['view_id'], 'exist', 'skipOnError' => true, 'targetClass' => View::class, 'targetAttribute' => ['view_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер маршрута',
            'count_car' => 'Количество транспорта на этом маршруте',
            'count_stop' => 'Количество остановок',
            'count_users' => 'Количество пассажиров ежедневно',
            'view_id' => 'View ID',
            'way_id' => 'Way ID',
        ];
    }

    /**
     * Gets query for [[View]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(View::class, ['id' => 'view_id']);
    }

    /**
     * Gets query for [[Way]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWay()
    {
        return $this->hasOne(Way::class, ['id' => 'way_id']);
    }

}
