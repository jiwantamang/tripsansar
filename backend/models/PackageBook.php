<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "package_book".
 *
 * @property integer $id
 * @property integer $package_id
 * @property integer $user_id
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 */
class PackageBook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package_book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id', 'user_id', 'email', 'created_at', 'updated_at'], 'required'],
            [['package_id', 'user_id', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'Package ID',
            'user_id' => 'User ID',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
