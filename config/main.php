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
    'modules' => [
        'v1' => [
            'class' => 'restapi\modules\v1\Module',
        ],
    ],
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
            'enableStrictParsing' => true, //s
            'showScriptName' => false,
            'rules' => [
                'auth'=>'auth/login',
                'reg'=>'auth/reg',
                'v1'=>'v1/default',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['post'],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/default',
                        'v1/product-category',
                        'v1/products',
                    ],

                ],
            ],
        ],
    ],
    'params' => $params,
];
