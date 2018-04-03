<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "testimonial".
 *
 * @property integer $id
 * @property string $heading
 * @property string $description
 * @property string $fullname
 * @property string $designation
 * @property integer $place_place_id
 * @property string $image
 *
 * @property Place $placePlace
 */


class Testimonial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;
    public static function tableName()
    {
        return 'testimonial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['place_place_id'], 'integer'],
            [['heading', 'fullname', 'designation', 'image'], 'string', 'max' => 45],
            [['place_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::className(), 'targetAttribute' => ['place_place_id' => 'place_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'heading' => 'Heading',
            'description' => 'Description',
            'fullname' => 'Fullname',
            'designation' => 'Designation',
            'place_place_id' => 'Place Place ID',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlacePlace()
    {
        return $this->hasOne(Place::className(), ['place_id' => 'place_place_id']);
    }


    public function upload($filename)
    {
      if ($this->validate()) {
        $this->imageFile->saveAs(Yii::$app->basePath.'/'.'upload/testimonial/'.$filename);
            return true;

        } else {
            return false;
        }
    }

}
