<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place_image".
 *
 * @property integer $id
 * @property string $image_name
 * @property string $image_description
 * @property integer $place_id
 *
 * @property Place $place
 */
class PlaceImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id'], 'required'],
            [['place_id'], 'integer'],
            [['image_name', 'image_description'], 'string', 'max' => 45],
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
            'place_id' => 'Place ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['place_id' => 'place_id']);
    }
}
