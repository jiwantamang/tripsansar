<?php
namespace backend\models;

use yii\base\Model;
use common\models\HotelUser;

/**
 * Signup form
 */
class HotelSignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $hotelid;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['hotelid','required'],
            ['username', 'unique', 'targetClass' => '\common\models\HotelUser', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\HotelUser', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new HotelUser();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->hotelid = $this->hotelid;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
