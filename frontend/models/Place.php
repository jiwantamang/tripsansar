<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $place_id
 * @property integer $user_id
 * @property string $placetitle
 * @property string $placeaddress
 * @property string $placedescription
 * @property string $placeimages
 * @property string $placecatagory
 * @property string $placespeciality
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'placetitle', 'placeaddress', 'placedescription', 'placeimages', 'placecatagory', 'placespeciality'], 'required'],
            [['file'], 'file'],
            [['placedescription'],'string', 'min' => 200],
            [['placespeciality'],'string', 'min' => 200],
            [['placetitle', 'placeaddress', 'placeimages', 'placecatagory'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'placetitle' => 'Placetitle',
            'placeaddress' => 'Placeaddress',
            'placedescription' => 'Placedescription',
            'file' => 'Placeimages',
            'placecatagory' => 'Placecatagory',
            'placespeciality' => 'Placespeciality',
        ];
    }
}
