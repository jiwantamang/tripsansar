<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "reservation_room".
 *
 * @property integer $id
 * @property integer $room_no
 * @property string $rate
 * @property string $transaction_id
 */
class ReservationRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reservation_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_no'], 'integer'],
            [['rate'], 'number'],
            [['transaction_id'], 'string', 'max' => 100],
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
            'rate' => 'Rate',
            'transaction_id' => 'Transaction ID',
        ];
    }
}
