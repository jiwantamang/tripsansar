<?php
namespace frontend\models;


use yii\base\Model;

class Passchange extends Model{
    public $oldPassword;
    public $newPassword;
    public $passwordConfirm;

    public function rules()
    {
        return [
            [['oldPassword','newPassword','passwordConfirm'],'required'],
            [['passwordConfirm'],'compare','compareAttribute'=>'newPassword','message'=>'Password doesn\'t match']

        ];
    }
}
