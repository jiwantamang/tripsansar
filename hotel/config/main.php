<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-hotel',
    'name'=>'tripsansar',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'hotel\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-hotel',
        ],
        'user' => [
            'identityClass' => 'common\models\HotelUser',
            'enableAutoLogin' => true,
            'enableSession'=>true,
            'identityCookie' => ['name' => '_identity-hotel', 'httpOnly' => true],
        ],

        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-hotel',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//           // 'showScriptName' => false,
//            'rules' => [
//            ],
//        ],
        
    ],
    'params' => $params,
];
