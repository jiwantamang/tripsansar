<?php

namespace frontend\models;

use Yii;
use common\models\Customer;
use common\events\SendMailEvent;


class CustomerBehavior{
//    public $fromName = "Jiwan Tamang";
//    public $fromAddress = "jiwan.tamang255@gmail.com";
//    
//    public function events()
//    {
//        return [
//            Customer::EVENT_SEND_MAIL =>[$this,'sendMailViaEvent'],            
//        ];
//    }
//    
//    public function sendMail(){
//        \Yii::$app->mailer->compose()
//                ->setFrom([$this->fromAddress => $this->fromName])
//                ->setTo(['jiwan.tamang255@gmail.com' => 'Roman Tamang'])
//                ->setSubject('Account Created')
//                ->setTextBody('Please Check Your Account')
//                ->setHtmlBody('<b>Please Check You Account </b<')
//                ->send();
//    }
//    
    public static function sendActivateMail(Customer $customer){
        \Yii::$app->mailer->compose('register',['model'=>$customer])
                ->setFrom(Yii::$app->params['adminEmail'])
                //->setTo(['jiwan.tamang255@gmail.com' => 'Roman Tamang'])
                ->setTo($customer->email)
                ->setSubject('Account Created')
                ->setTextBody('Please Check Your Account')
                //->setHtmlBody('<b>Please Check You Account </b<')
                ->send();
        
        
    }
   
}