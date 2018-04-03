<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=tripsansardb',
            'username' => 'root',
            'password' => 'programmer',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
                        
            //'useFileTransport' => true,
            
            
            //enable below section to send mail
            'useFileTransport' => false,
            'transport'=>[
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',  
//                'username' => 'jiwan.tamang255@gmail.com',
//                'password' => 'iamjiwantamang12345678',
                'username'=>'cs.tripsansar@gmail.com',
                'password'=>'Tripsansar@123',
                'port' => '587', 
                'encryption' => 'tls', 
            ],
        ],
    ],
];
