<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\root;
use yii\helpers\VarDumper;

/**
 * rootSearch represents the model behind the search form of `app\models\root`.
 */
class rootSearch extends root
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'count_car', 'count_stop', 'count_users', 'view_id', 'way_id'], 'integer'],
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
        $query = root::find()
            ->with("way")
            ->with("view");

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
            'number' => $this->number,
            'count_car' => $this->count_car,
            'count_stop' => $this->count_stop,
            'count_users' => $this->count_users,
            'view_id' => $this->view_id,
            'way_id' => $this->way_id,
        ]);

        return $dataProvider;
    }

    public function searchSecond($params, $formName = null)
    {
        $query = root::find()
            ->select([
                'ROUND(length / count_stop / speed_average * 60, 2) as minuts'
            ])
            ->innerJoin('view', 'view.id = root.view_id')
            ->innerJoin('way', 'way.id = root.way_id')
            ->where(['number' => 2]);

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
            'number' => $this->number,
            'count_car' => $this->count_car,
            'count_stop' => $this->count_stop,
            'count_users' => $this->count_users,
            'view_id' => $this->view_id,
            'way_id' => $this->way_id,
        ]);

        return $dataProvider;
    }

    public function searchThird($params, $formName = null)
    {
        $query = root::find()
            ->select([
                'number',
                'start',
                'end',
                'length'
            ])
            ->innerJoin('way', 'root.way_id = way.id')
            ->innerJoin('view', 'view.id = root.view_id')
            ->where(['title' => "Троллейбус"])
            ->orderBy(['length' => SORT_ASC]);


        // add conditions that should always apply here

        // VarDumper::dump($query->createCommand()->getSql()); die;

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
            'number' => $this->number,
            'count_car' => $this->count_car,
            'count_stop' => $this->count_stop,
            'count_users' => $this->count_users,
            'view_id' => $this->view_id,
            'way_id' => $this->way_id,
        ]);
        return $dataProvider;
    }

    public function searchFourth($params, $formName = null)
    {
        $query = root::find()
            ->select([
                'title',
                'SUM(cost * count_users) as profit',
            ])
            ->innerJoin('way', 'root.way_id = way.id')
            ->innerJoin('view', 'view.id = root.view_id')
            ->groupBy('title');


        // add conditions that should always apply here

        // VarDumper::dump($query->createCommand()->getSql()); die;

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
            'number' => $this->number,
            'count_car' => $this->count_car,
            'count_stop' => $this->count_stop,
            'count_users' => $this->count_users,
            'view_id' => $this->view_id,
            'way_id' => $this->way_id,
        ]);
        return $dataProvider;
    }

    public static function secondExport()
    {
        $query = root::find()
            ->select([
                'ROUND(length / count_stop / speed_average * 60, 2) as minuts'
            ])
            ->innerJoin('view', 'view.id = root.view_id')
            ->innerJoin('way', 'way.id = root.way_id')
            ->where(['number' => 2]);

        // add conditions that should always apply here

        return $query->asArray()->all();
    }

    public static function thirdExport()
    {
        $query = root::find()
            ->select([
                'number',
                'start',
                'end',
                'length'
            ])
            ->innerJoin('way', 'root.way_id = way.id')
            ->innerJoin('view', 'view.id = root.view_id')
            ->where(['title' => "Троллейбус"])
            ->orderBy(['length' => SORT_ASC]);

        // add conditions that should always apply here

        return $query->asArray()->all();
    }

    public static function fourthExport()
    {
        $query = root::find()
            ->select([
                'title',
                'SUM(cost * count_users) as profit',
            ])
            ->innerJoin('way', 'root.way_id = way.id')
            ->innerJoin('view', 'view.id = root.view_id')
            ->groupBy('title');

        // add conditions that should always apply here

        return $query->asArray()->all();
    }
}
