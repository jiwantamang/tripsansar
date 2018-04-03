<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "hotel_comments".
 *
 * @property integer $id
 * @property string $comments
 * @property string $date_created
 * @property integer $hotel_hotel_id
 * @property integer $customer_id
 *
 * @property Customer $customer
 * @property Hotel $hotelHotel
 */
class HotelComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hotel_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comments'], 'string'],
            [['date_created'], 'safe'],
            [['hotel_hotel_id', 'customer_id'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
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
            'comments' => 'Comments',
            'date_created' => 'Date Created',
            'hotel_hotel_id' => 'Hotel Hotel ID',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelHotel()
    {
        return $this->hasOne(Hotel::className(), ['hotel_id' => 'hotel_hotel_id']);
    }
}
