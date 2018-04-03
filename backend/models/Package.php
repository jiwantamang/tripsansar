<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property integer $id
 * @property string $package_name
 * @property string $package_description
 * @property integer $package_owner
 * @property string $amount
 * @property integer $minimum_team_no
 * @property integer $start_date
 * @property integer $total_days
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_name', 'package_description', 'package_owner', 'amount', 'minimum_team_no', 'start_date', 'total_days'], 'required'],
            [['package_description'], 'string'],
            [['package_owner', 'minimum_team_no', 'start_date', 'total_days'], 'integer'],
            [['amount'], 'number'],
            [['package_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_name' => 'Package Name',
            'package_description' => 'Package Description',
            'package_owner' => 'Package Owner',
            'amount' => 'Amount',
            'minimum_team_no' => 'Minimum Team No',
            'start_date' => 'Start Date',
            'total_days' => 'Total Days',
        ];
    }
}
