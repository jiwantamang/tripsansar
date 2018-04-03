<?php

namespace frontend\models;

use Yii;
use common\models\Customer;
/**
 * This is the model class for table "customer_profile".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $address
 * @property string $gender
 * @property integer $customer_id
 *
 * @property Customer $customer
 */
class CustomerProfile extends \yii\db\ActiveRecord
{
   /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id'], 'integer'],
            [['firstName', 'middleName', 'lastName', 'gender'], 'string', 'max' => 45],
            [['address', 'image'], 'string', 'max' => 100],
            [['telephone', 'dob'], 'string', 'max' => 15],
            [['nationality'], 'string', 'max' => 20],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'lastName' => 'Last Name',
            'address' => 'Address',
            'gender' => 'Gender',
            'customer_id' => 'Customer ID',
            'image' => 'Image',
            'telephone' => 'Telephone',
            'dob' => 'Date Of Birth',
            'nationality' => 'Nationality',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}
