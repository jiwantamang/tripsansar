<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place_hotel".
 *
 * @property integer $id
 * @property integer $place_place_id
 * @property integer $hotel_hotel_id
 *
 * @property Hotel $hotelHotel
 * @property Place $placePlace
 */
class PlaceHotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place_hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_place_id', 'hotel_hotel_id'], 'integer'],
            [['hotel_hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotel::className(), 'targetAttribute' => ['hotel_hotel_id' => 'hotel_id']],
            [['place_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['place_place_id' => 'place_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_place_id' => 'Place Place ID',
            'hotel_hotel_id' => 'Hotel Hotel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelHotel()
    {
        return $this->hasOne(Hotel::className(), ['hotel_id' => 'hotel_hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlacePlace()
    {
        return $this->hasOne(Place::className(), ['place_id' => 'place_place_id']);
    }
}
