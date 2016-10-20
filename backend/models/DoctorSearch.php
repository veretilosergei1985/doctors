<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Doctor;

/**
 * DoctorSearch represents the model behind the search form of `common\models\Doctor`.
 */
class DoctorSearch extends Doctor
{
    public $specialities;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'title', 'description', 'experience', 'image', 'fullName', 'specialities'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Doctor::find();
        $query->joinWith('specialities');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'doctor.title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'image', $this->image]);

        // filter by speciality
//        $query->joinWith(['specialities' => function ($q) {
//            $q->where('speciality.title LIKE "%' . $this->specialities . '%"');
//        }]);

        $query->andFilterWhere(['like', 'speciality.title', $this->specialities]);

        //$query->joinRelation('myrel', '...')->with('myrel')->all();

        return $dataProvider;
    }
}
