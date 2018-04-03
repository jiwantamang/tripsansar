<?php

namespace backend\models;

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
    public $country;
    public $city;
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
            [['user_id','is_adventure', 'placetitle','city','placeimages','placedescription', 'placecatagory'], 'required'],
            //[['file'], 'file','skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4]],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['placedescription'],'string', 'min' => 200],
            [['placespeciality'],'string', 'min' => 200],
            [['festivals'],'string', 'min' => 100],
            [['trip_summary'],'string', 'min' => 20],
            [['contact'],'string'],
            [['placetitle', 'placeaddress', 'placeimages', 'placecatagory'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'placetitle' => 'Place Title',
            'placeaddress' => 'Place Address',
            'placedescription' => 'Place Description',
            'file' => 'Place Image',
            'placeimages'=>'Address Details',
            'placecatagory' => 'Place Catagory',
            'placespeciality' => 'Place Speciality',
            'trip_summary'=>'Trip Summary',
            'contact'=>'Contact Details',
            'is_adventure'=>'Is Adventure ?'
        ];
    }
}
