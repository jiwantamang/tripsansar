<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property integer $hotel_id
 * @property string $hotelname
 * @property string $owner
 * @property string $establish_date
 * @property string $hotel_catagory
 * @property string $hotel_type
 * @property string $active
 *
 * @property Room[] $rooms
 */
class Hotel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotelname', 'owner', 'establish_date', 'hotel_catagory', 'hotel_type', 'active'], 'required'],
            [['hotelname', 'owner', 'establish_date', 'hotel_catagory', 'hotel_type', 'active'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hotel_id' => 'Hotel ID',
            'hotelname' => 'Hotelname',
            'owner' => 'Owner',
            'establish_date' => 'Establish Date',
            'hotel_catagory' => 'Hotel Catagory',
            'hotel_type' => 'Hotel Type',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['hotel_id' => 'hotel_id']);
    }
}
