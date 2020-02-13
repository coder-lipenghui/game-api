<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule','controller' => 'user'],
                //玩家信息接口
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'player',
                    'pluralize'=>false,
//                    'extraPatterns' => [
//                        'GET search' => 'search',
//                        'GET items' => 'items',
//                    ]
                ],
                //物品获取日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'itemadd',
                    'pluralize'=>false
                ],
                //物品移除日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'itemrem',
                    'pluralize'=>false
                ],
                //死亡日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'death',
                    'pluralize'=>false
                ],
                //物品交易日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'trade',
                    'pluralize'=>false
                ],
                //元宝获取日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'vcoinadd',
                    'pluralize'=>false
                ],
                //元宝移除日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'vcoinrem',
                    'pluralize'=>false
                ],
                //绑定元宝获取日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'bvcoinadd',
                    'pluralize'=>false
                ],
                //绑定元宝移除日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'bvcoinrem',
                    'pluralize'=>false
                ],
                //元宝交易日志
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'tradevc',
                    'pluralize'=>false
                ],
                //脚本上传
                [
                    'class' => 'yii\rest\UrlRule','controller' => 'script',
                    'pluralize'=>false,
                    'extraPatterns' => [
                        'OPTIONS,POST upload' => 'upload',
                        'POST update' =>'update'
                    ]
                ],
                ['class' => 'yii\rest\UrlRule','controller' => 'payinfo'],
                ['class' => 'yii\rest\UrlRule','controller' => 'couple'],
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>'
            ],
        ]
    ],
    'params' => $params,
];
