<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
/**
 * This is the model class for table "place_gallary".
 *
 * @property integer $id
 * @property string $image_name
 * @property string $image_description
 * @property string $image_caption
 * @property integer $place_id
 *
 * @property Place $place
 */
class PlaceGallary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;
    public static function tableName()
    {
        return 'place_gallary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id'], 'required'],
            [['place_id'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['image_name', 'image_description', 'image_caption'], 'string', 'max' => 45],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['place_id' => 'place_id']],
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
            'image_caption' => 'Image Caption',
            'place_id' => 'Place ID',
        ];
    }

    public function upload($filename)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::$app->basePath.'/'.'upload/place_gallary/'.$filename);

            // crop thumbail
            Image::thumbnail(Yii::$app->basePath.'/'.'upload/place_gallary/'.$filename,200,200)
                  ->save(Yii::$app->basePath.'/'.'upload/place_gallary/place_gallary_thumbnail/'.$filename, ['quality' => 120]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['place_id' => 'place_id']);
    }
}
