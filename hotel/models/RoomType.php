<?php

namespace hotel\models;

use Yii;

/**
 * This is the model class for table "room_type".
 *
 * @property integer $id
 * @property string $room_type
 * @property string $description
 *
 * @property Room[] $rooms
 */
class RoomType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_type', 'description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_type' => 'Room Type',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['room_type_id' => 'id']);
    }
}
