<?php

namespace hotel\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "room_image".
 *
 * @property integer $id
 * @property string $image
 * @property string $description
 * @property integer $room_room_id
 *
 * @property Room $roomRoom
 */
class RoomImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;
    public static function tableName()
    {
        return 'room_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_room_id'], 'integer'],
            [['image', 'description'], 'string', 'max' => 45],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['room_room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_room_id' => 'room_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'description' => 'Description',
            'room_room_id' => 'Room Room ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomRoom()
    {
        return $this->hasOne(Room::className(), ['room_id' => 'room_room_id']);
    }

    public function upload($filename)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::$app->basePath.'/'.'upload/room_image/'.$filename);

            // crop thumbail
            Image::thumbnail(Yii::$app->basePath.'/'.'upload/room_image/'.$filename,100,100)
                ->save(Yii::$app->basePath.'/'.'upload/room_image/room_image_thumbnail/'.$filename, ['quality' => 120]);
            return true;
        } else {
            return false;
        }
    }
}
