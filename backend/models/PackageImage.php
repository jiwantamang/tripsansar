<?php

namespace backend\models;


use Yii;
use yii\imagine\Image;
/**
 * This is the model class for table "package_image".
 *
 * @property integer $id
 * @property string $image_name
 * @property integer $package_id
 */
class PackageImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;
    public static function tableName()
    {
        return 'package_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_name', 'package_id'], 'required'],
            [['package_id'], 'integer'],
            [['image_name'], 'string', 'max' => 255],
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
            'package_id' => 'Package ID',
        ];
    }
    
    public function upload($filename)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::$app->basePath.'/'.'upload/package_gallary/'.$filename);

            // crop thumbail
            Image::thumbnail(Yii::$app->basePath.'/'.'upload/package_gallary/'.$filename,200,200)
                  ->save(Yii::$app->basePath.'/'.'upload/package_gallary/package_gallary_thumbnail/'.$filename, ['quality' => 120]);
            return true;
        } else {
            return false;
        }
    }

}
