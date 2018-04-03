<?php

namespace hotel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use hotel\models\HotelFacility;

/**
 * HotelFacilitySearch represents the model behind the search form about `hotel\models\HotelFacility`.
 */
class HotelFacilitySearch extends HotelFacility
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hotel_hotel_id'], 'integer'],
            [['facility', 'description', 'note', 'date_created', 'date_updated', 'date_deleted'], 'safe'],
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
        $query = HotelFacility::find();

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

        $query->andFilterWhere(['like', 'facility', $this->facility])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'date_created', $this->date_created])
            ->andFilterWhere(['like', 'date_updated', $this->date_updated])
            ->andFilterWhere(['like', 'date_deleted', $this->date_deleted]);

        return $dataProvider;
    }
}
