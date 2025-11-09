<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view".
 *
 * @property int $id
 * @property string $title
 * @property int $count
 * @property int $cost
 * @property int $speed_average
 *
 * @property Root[] $roots
 */
class View extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'count', 'cost', 'speed_average'], 'required'],
            [['count', 'cost', 'speed_average'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'count' => 'Количество в парке',
            'cost' => 'Стоимость проезда',
            'speed_average' => 'Средняя скорость',
        ];
    }

    /**
     * Gets query for [[Roots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoots()
    {
        return $this->hasMany(Root::class, ['view_id' => 'id']);
    }

}
