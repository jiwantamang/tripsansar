<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Place;

/**
 * PlaceSearch represents the model behind the search form about `frontend\models\Place`.
 */
class PlaceSearch extends Place
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id', 'user_id'], 'integer'],
            [['placetitle', 'placeaddress', 'placedescription', 'placeimages', 'placecatagory', 'placespeciality'], 'safe'],
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
        $query = Place::find();

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
            'place_id' => $this->place_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'placetitle', $this->placetitle])
            ->andFilterWhere(['like', 'placeaddress', $this->placeaddress])
            ->andFilterWhere(['like', 'placedescription', $this->placedescription])
            ->andFilterWhere(['like', 'placeimages', $this->placeimages])
            ->andFilterWhere(['like', 'placecatagory', $this->placecatagory])
            ->andFilterWhere(['like', 'placespeciality', $this->placespeciality]);

        return $dataProvider;
    }
}
