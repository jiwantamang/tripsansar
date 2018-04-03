<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "esewa_tbl".
 *
 * @property integer $id
 * @property string $tAmt
 * @property string $amt
 * @property string $txAmt
 * @property string $psc
 * @property string $pdc
 * @property string $scd
 * @property integer $pid
 * @property string $su
 * @property string $fu
 * @property string $status
 * @property string $date_created
 */
class EsewaTbl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'esewa_tbl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tAmt', 'amt', 'txAmt', 'psc', 'pdc', 'scd'], 'number'],
            [['pid'], 'integer'],
            [['su', 'fu'], 'string'],
            [['status', 'date_created'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tAmt' => 'T Amt',
            'amt' => 'Amt',
            'txAmt' => 'Tx Amt',
            'psc' => 'Psc',
            'pdc' => 'Pdc',
            'scd' => 'Scd',
            'pid' => 'Pid',
            'su' => 'Su',
            'fu' => 'Fu',
            'status' => 'Status',
            'date_created' => 'Date Created',
        ];
    }
}
