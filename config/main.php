<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-restapi',
    'basePath' => dirname(__DIR__),
    'homeUrl'=>'/restapi',
    'controllerNamespace' => 'restapi\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'baseUrl'=>'/restapi',
            'csrfParam' => '_csrf-restapi',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession'=>false,
            'loginUrl'=>null,
            'identityCookie' => ['name' => '_identity-restapi', 'httpOnly' => true],
        ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
       
        'urlManager' => [
            'baseUrl'=>'/restapi',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                'auth'=>'auth/login',
                'reg'=>'auth/reg',

                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['post'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
