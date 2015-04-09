<?php

return [
    "id" => "task_developer_php",
    "basePath" => realpath(__DIR__ . "/../"),
    "defaultRoute" => "products/index",
    "components" => [
        "log" => [
            "traceLevel" => YII_DEBUG ? 3 : 0,
            'targets' => [
                'class' => 'yii\log\FileTargets',
                'levels' => ['error', 'warning'],
            ]
        ],
        "user" => [
            'identityClass' => 'app\\models\\user\\UserRecord',
            'enableAutoLogin' => false,
        ],
        "urlManager" => [
            "enablePrettyUrl" => true,
            "showScriptName" => false,
//            "enableStrictParsing" => true,
            "rules" => [
//                [
//                    'pattern' => [
//                        "GET api/<controller>" => "api/<controller>/index",
//                        "GET api/<controller>/<id>" => "api/<controller>/view",
//                        "POST api/<controller>" => "api/<controller>/create",
//                        "PUT api/<controller>/<id>" => "api/<controller>/update",
//                        "DELETE api/<controller>/<id>" => "api/<controller>/delete",
//                    ]
//                ]
                [
                    'class' => \yii\rest\UrlRule::className(),
                    "controller" => [
                        "api/distributors",
                        "api/products",
                        "api/categories"
                    ],
                ],
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ]
        ],
        "request" => [
            "cookieValidationKey" => 'key123',
            "parsers" => [
                'application/json' => 'yii\\web\\JsonParser'
            ]
        ],
        "db" => require(__DIR__ . "/app_mysql.php"),
    ],
    "modules" => [
        'api' => [
            'class' => \app\modules\api\ApiModule::className(),
            'basePath' => '@app/modules/api',
//            'components' => [
//                "urlManager" => [
//                    "class" => \yii\web\UrlManager::className(),
////                    "enableStrictParsing" => true,
//                    "rules" => [
//                        [
//                            "class" => \yii\rest\UrlRule::className(),
//                            "controller" => [
//                                "api/distributors",
//                                "api/products",
//                                "api/categories"
//                            ],
//                        ],
//                    ],
//                ],
//                "request" => [
//                    "class" => \yii\web\Request::className(),
//                    "parsers" => [
//                        'application/json' => 'yii\\web\\JsonParser'
//                    ]
//                ],
//            ]
        ],
    ],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
];