<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property integer $id
 * @property string $price_per_day
 * @property string $date_from
 * @property string $date_to
 * @property string $reservation_date
 * @property integer $room_id
 * @property integer $customer_id
 * @property string $transaction_id
 * @property string $status
 * @property integer $hotelid
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    private $color;
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_per_day'], 'number'],
            [['date_from', 'date_to'], 'required'],
            [['date_from', 'date_to', 'reservation_date'], 'safe'],
            [['room_id', 'customer_id', 'hotelid'], 'integer'],
            [['transaction_id', 'status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price_per_day' => 'Price Per Day',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'reservation_date' => 'Reservation Date',
            'room_id' => 'Room ID',
            'customer_id' => 'Customer ID',
            'transaction_id' => 'Transaction ID',
            'status' => 'Status',
            'hotelid' => 'Hotelid',
        ];
    }
}