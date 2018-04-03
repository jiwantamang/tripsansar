<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "hotel_facility".
 *
 * @property integer $id
 * @property string $facility
 * @property string $description
 * @property string $note
 * @property string $date_created
 * @property string $date_updated
 * @property string $date_deleted
 * @property integer $hotel_hotel_id
 *
 * @property Hotel $hotelHotel
 */
class HotelFacility extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel_facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_hotel_id'], 'required'],
            [['hotel_hotel_id'], 'integer'],
            [['facility', 'description', 'note', 'date_created', 'date_updated', 'date_deleted'], 'string', 'max' => 45],
            [['hotel_hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotel::className(), 'targetAttribute' => ['hotel_hotel_id' => 'hotel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'facility' => 'Facility',
            'description' => 'Description',
            'note' => 'Note',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'date_deleted' => 'Date Deleted',
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
}
