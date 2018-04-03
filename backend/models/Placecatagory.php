<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "placecatagory".
 *
 * @property integer $placecatagory_id
 * @property string $placecatagory
 *
 * @property PlacecatagoryPlace[] $placecatagoryPlaces
 */
class Placecatagory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'placecatagory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['placecatagory'], 'required'],
            [['placecatagory'], 'string', 'max' => 222],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'placecatagory_id' => 'Placecatagory ID',
            'placecatagory' => 'Placecatagory',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlacecatagoryPlaces()
    {
        return $this->hasMany(PlacecatagoryPlace::className(), ['placecatagory_placecatagory_id' => 'placecatagory_id']);
    }
}
