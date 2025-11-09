<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\way;

/**
 * waySearch represents the model behind the search form of `app\models\way`.
 */
class waySearch extends way
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'length'], 'integer'],
            [['start', 'end'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = way::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'length' => $this->length,
        ]);

        $query->andFilterWhere(['like', 'start', $this->start])
            ->andFilterWhere(['like', 'end', $this->end]);

        return $dataProvider;
    }

    public function searchFirst($params, $formName = null)
    {
        $query = way::find()
            ->select(['start', 'end', 'way.length', 'speed_average', '(length / speed_average * 60) as time'])
            ->innerJoin('root', 'root.way_id = way.id')
            ->innerJoin('view', 'view.id = root.view_id')
            ->where(['way.id' => 1])
            ->orderBy(['view.speed_average' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'length' => $this->length,
        ]);

        $query->andFilterWhere(['like', 'start', $this->start])
            ->andFilterWhere(['like', 'end', $this->end]);

        return $dataProvider;
    }

    public static function firstExport()
    {

        $query = way::find()
            ->select(['start', 'end', 'way.length', 'speed_average', '(length / speed_average * 60) as time'])
            ->innerJoin('root', 'root.way_id = way.id')
            ->innerJoin('view', 'view.id = root.view_id')
            ->where(['way.id' => 1])
            ->orderBy(['view.speed_average' => SORT_DESC]);
        
            return $query->asArray()->all();
    }
}
