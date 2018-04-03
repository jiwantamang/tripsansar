<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "temp_book_room".
 *
 * @property integer $id
 * @property string $room_no
 * @property string $price
 * @property integer $transaction_id
 */
class TempBookRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_book_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['transaction_id'], 'string'],
            [['room_no'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_no' => 'Room No',
            'price' => 'Price',
            'transaction_id' => 'Transaction ID',
        ];
    }
}