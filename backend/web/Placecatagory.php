<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "placecatagory".
 *
 * @property integer $placecatagory_id
 * @property string $placecatagory
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
}
