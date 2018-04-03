<?php 

namespace frontend\controllers;

use yii\base\Event;
use frontend\models\CustomerBehavior;
use common\models\Customer;

class EventController{
    
    const EVENT_DEMO = 'eventDemo';
    
    public static function sendActivateMail(Customer $customer){
        CustomerBehavior::sendActivateMail($customer);
    }
    
}
