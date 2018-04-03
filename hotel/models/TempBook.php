<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "temp_book".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $hotel_id
 * @property string $check_in
 * @property string $check_out
 * @property integer $payment_status
 * @property integer $date_payment
 * @property string $payment_method
 * @property string $transaction_id
 *
 * @property TempBookRoom[] $tempBookRooms
 */
class TempBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'hotel_id', 'payment_status', 'date_payment'], 'integer'],
            [['check_in', 'check_out'], 'safe'],
            [['payment_method', 'transaction_id'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'hotel_id' => 'Hotel ID',
            'check_in' => 'Check In',
            'check_out' => 'Check Out',
            'payment_status' => 'Payment Status',
            'date_payment' => 'Date Payment',
            'payment_method' => 'Payment Method',
            'transaction_id' => 'Transaction ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempBookRooms()
    {
        return $this->hasMany(TempBookRoom::className(), ['temp_book_id' => 'id']);
    }
}
