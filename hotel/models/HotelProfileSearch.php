<?php

namespace hotel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use hotel\models\HotelProfile;

/**
 * HotelProfileSearch represents the model behind the search form about `hotel\models\HotelProfile`.
 */
class HotelProfileSearch extends HotelProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hotel_hotel_id'], 'integer'],
            [['description', 'rating', 'minimum_cost', 'address', 'note1', 'note2', 'note3', 'note4', 'image'], 'safe'],
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
        $query = HotelProfile::find();

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
            'hotel_hotel_id' => $this->hotel_hotel_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'minimum_cost', $this->minimum_cost])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'note1', $this->note1])
            ->andFilterWhere(['like', 'note2', $this->note2])
            ->andFilterWhere(['like', 'note3', $this->note3])
            ->andFilterWhere(['like', 'note4', $this->note4])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
