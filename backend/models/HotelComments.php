<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hotel_comments".
 *
 * @property integer $id
 * @property integer $hotel_id
 * @property string $comments
 * @property string $date_created
 * @property integer $user_id
 * @property integer $hotel_hotel_id
 * @property integer $user_id1
 *
 * @property Hotel $hotelHotel
 * @property User $userId1
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
            [['hotel_id', 'user_id', 'hotel_hotel_id', 'user_id1'], 'integer'],
            [['comments'], 'string'],
            [['date_created'], 'safe'],
            [['hotel_hotel_id', 'user_id1'], 'required'],
            [['hotel_hotel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hotel::className(), 'targetAttribute' => ['hotel_hotel_id' => 'hotel_id']],
            //[['user_id1'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id1' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_id' => 'Hotel ID',
            'comments' => 'Comments',
            'date_created' => 'Date Created',
            'user_id' => 'User ID',
            'hotel_hotel_id' => 'Hotel Hotel ID',
            'user_id1' => 'User Id1',
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
    public function getUserId1()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id1']);
    }
}
