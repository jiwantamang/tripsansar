<?php

namespace hotel\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use hotel\models\HotelGallary;

/**
 * HotelGallarySearch represents the model behind the search form about `hotel\models\HotelGallary`.
 */
class HotelGallarySearch extends HotelGallary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hotel_hotel_id'], 'integer'],
            [['image_name', 'image_description'], 'safe'],
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
        $query = HotelGallary::find();

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

        $query->andFilterWhere(['like', 'image_name', $this->image_name])
            ->andFilterWhere(['like', 'image_description', $this->image_description]);

        return $dataProvider;
    }
}
