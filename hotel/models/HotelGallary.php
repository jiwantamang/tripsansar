<?php

namespace hotel\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "hotel_gallary".
 *
 * @property integer $id
 * @property string $image_name
 * @property string $image_description
 * @property integer $hotel_hotel_id
 *
 * @property Hotel $hotelHotel
 */
class HotelGallary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;
    public static function tableName()
    {
        return 'hotel_gallary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hotel_hotel_id'], 'required'],
            [['hotel_hotel_id'], 'integer'],
            [['image_name', 'image_description'], 'string', 'max' => 45],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'image_name' => 'Image Name',
            'image_description' => 'Image Description',
            'hotel_hotel_id' => 'Hotel Hotel ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotelHotel()
    {
        return $this->hasOne(Hotel::className(), ['hotel_id' => 'hotel_hotel_id']);
    }

    public function upload($filename)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::$app->basePath.'/'.'upload/hotel_gallary/'.$filename);

            // crop thumbail
            Image::thumbnail(Yii::$app->basePath.'/'.'upload/hotel_gallary/'.$filename,200,200)
                ->save(Yii::$app->basePath.'/'.'upload/hotel_gallary/hotel_gallary_thumbnail/'.$filename, ['quality' => 120]);
            return true;
        } else {
            return false;
        }
    }
}
