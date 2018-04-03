<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property integer $place_id
 * @property string $placetitle
 * @property string $placeaddress
 * @property string $placedescription
 * @property string $placeimages
 * @property string $placecatagory
 * @property string $placespeciality
 * @property integer $user_id
 * @property string $festivals
 * @property string $trip_summary
 * @property string $contact
 * @property integer $is_adventure
 *
 * @property User $user
 * @property PlaceEvent[] $placeEvents
 * @property PlaceGallary[] $placeGallaries
 * @property PlaceHotel[] $placeHotels
 * @property PlaceImage[] $placeImages
 * @property PlacecatagoryPlace[] $placecatagoryPlaces
 * @property Testimonial[] $testimonials
 */

use common\models\User;

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
            [['placetitle', 'placedescription', 'placecatagory', 'user_id'], 'required'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['placedescription', 'placespeciality', 'festivals', 'trip_summary'], 'string'],
            [['user_id', 'is_adventure'], 'integer'],
            [['placetitle', 'placeaddress', 'placeimages', 'placecatagory'], 'string', 'max' => 200],
            [['contact'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Place ID',
            'placetitle' => 'Placetitle',
            'placeaddress' => 'Placeaddress',
            'placedescription' => 'Placedescription',
            'placeimages' => 'Placeimages',
            'placecatagory' => 'Placecatagory',
            'placespeciality' => 'Placespeciality',
            'user_id' => 'User ID',
            'festivals' => 'Festivals',
            'trip_summary' => 'Trip Summary',
            'contact' => 'Contact',
            'is_adventure' => 'Is Adventure',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceEvents()
    {
        return $this->hasMany(PlaceEvent::className(), ['place_place_id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceGallaries()
    {
        return $this->hasMany(PlaceGallary::className(), ['place_id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceHotels()
    {
        return $this->hasMany(PlaceHotel::className(), ['place_place_id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaceImages()
    {
        return $this->hasMany(PlaceImage::className(), ['place_id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlacecatagoryPlaces()
    {
        return $this->hasMany(PlacecatagoryPlace::className(), ['place_place_id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestimonials()
    {
        return $this->hasMany(Testimonial::className(), ['place_place_id' => 'place_id']);
    }
}
