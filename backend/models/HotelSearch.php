<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Hotel;

/**
 * HotelSearch represents the model behind the search form about `backend\models\Hotel`.
 */
class HotelSearch extends Hotel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_id'], 'integer'],
            [['hotelname', 'owner', 'establish_date', 'hotel_catagory', 'hotel_type', 'active'], 'safe'],
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
        $query = Hotel::find();

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
            'hotel_id' => $this->hotel_id,
        ]);

        $query->andFilterWhere(['like', 'hotelname', $this->hotelname])
            ->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'establish_date', $this->establish_date])
            ->andFilterWhere(['like', 'hotel_catagory', $this->hotel_catagory])
            ->andFilterWhere(['like', 'hotel_type', $this->hotel_type])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
