<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "way".
 *
 * @property int $id
 * @property string $start
 * @property string $end
 * @property int $length
 *
 * @property Root[] $roots
 */
class Way extends \yii\db\ActiveRecord
{

    public $time;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'way';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start', 'end', 'length'], 'required'],
            [['length'], 'integer'],
            [['start', 'end'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start' => 'Начало',
            'end' => 'Конец',
            'length' => 'Расстояние(км)',
        ];
    }

    /**
     * Gets query for [[Roots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoots()
    {
        return $this->hasMany(Root::class, ['way_id' => 'id']);
    }

    public function getTitle( $id)
    {
        return static::findOne($id)->name;
    }
}
