<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property integer $adress_id
 * @property string $address
 * @property string $address_region
 * @property string $address_postalcode
 * @property integer $cities_city_id
 * @property integer $country_id
 * @property integer $place_id
 *
 * @property Cities $citiesCity
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cities_city_id'], 'required'],
            [['cities_city_id', 'country_id', 'place_id'], 'integer'],
            [['address', 'address_region', 'address_postalcode'], 'string', 'max' => 45],
            [['cities_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['cities_city_id' => 'city_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'adress_id' => 'Adress ID',
            'address' => 'Address',
            'address_region' => 'Address Region',
            'address_postalcode' => 'Address Postalcode',
            'cities_city_id' => 'Cities City ID',
            'country_id' => 'Country ID',
            'place_id' => 'Place ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCitiesCity()
    {
        return $this->hasOne(Cities::className(), ['city_id' => 'cities_city_id']);
    }
}
