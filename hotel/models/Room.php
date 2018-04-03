<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $room_id
 * @property integer $floor
 * @property integer $room_number
 * @property integer $has_conditioner
 * @property integer $has_tv
 * @property integer $has_phone
 * @property string $available_from
 * @property string $price_per_day
 * @property string $description
 * @property integer $hotel_id
 * @property integer $room_type_id
 *
 * @property Reservation[] $reservations
 * @property Hotel $hotel
 * @property RoomType $roomType
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $check = false;
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['floor', 'room_number', 'has_conditioner', 'has_tv', 'has_phone', 'available_from', 'hotel_id', 'room_type_id'], 'required'],
            [['floor', 'room_number', 'has_conditioner', 'has_tv', 'has_phone', 'hotel_id', 'room_type_id'], 'integer'],
            [['available_from'], 'safe'],
            [['price_per_day'], 'number'],
            [['description'], 'string'],
            [['hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotel::className(), 'targetAttribute' => ['hotel_id' => 'hotel_id']],
            [['room_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomType::className(), 'targetAttribute' => ['room_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_id' => 'Room ID',
            'floor' => 'Floor',
            'room_number' => 'Room Number',
            'has_conditioner' => 'Has Conditioner',
            'has_tv' => 'Has Tv',
            'has_phone' => 'Has Phone',
            'available_from' => 'Available From',
            'price_per_day' => 'Price Per Day',
            'description' => 'Description',
            'hotel_id' => 'Hotel ID',
            'room_type_id' => 'Room Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::className(), ['room_id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotel()
    {
        return $this->hasOne(Hotel::className(), ['hotel_id' => 'hotel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomType()
    {
        return $this->hasOne(RoomType::className(), ['id' => 'room_type_id']);
    }
}
