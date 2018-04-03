<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Addresses;

/**
 * AddressSearch represents the model behind the search form about `backend\models\Addresses`.
 */
class AddressSearch extends Addresses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['adress_id', 'cities_city_id', 'country_id', 'place_id'], 'integer'],
            [['address', 'address_region', 'address_postalcode'], 'safe'],
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
        $query = Addresses::find();

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
            'adress_id' => $this->adress_id,
            'cities_city_id' => $this->cities_city_id,
            'country_id' => $this->country_id,
            'place_id' => $this->place_id,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'address_region', $this->address_region])
            ->andFilterWhere(['like', 'address_postalcode', $this->address_postalcode]);

        return $dataProvider;
    }
}
