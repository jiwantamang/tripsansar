<?php

namespace common\events;

class SendMailEvent extends \yii\base\Event
{
    
    public $fromName;
    public $fromAddress;
    public $subject;
    public $url;
    
   
}