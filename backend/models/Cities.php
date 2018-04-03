<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property integer $countries_country_id
 *
 * @property Addresses[] $addresses
 * @property Countries $countriesCountry
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countries_country_id'], 'required'],
            [['countries_country_id'], 'integer'],
            [['city_name'], 'string', 'max' => 45],
            [['countries_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['countries_country_id' => 'country_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'countries_country_id' => 'Countries Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['cities_city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountriesCountry()
    {
        return $this->hasOne(Countries::className(), ['country_id' => 'countries_country_id']);
    }


    


}
