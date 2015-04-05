<?php

return [
    "id" => "task_developer_php",
    "basePath" => realpath(__DIR__ . "/../"),
    "components" => [
        "log" => [
            "traceLevel" => YII_DEBUG ? 3 : 0,
            'targets' => [
                'class' => 'yii\log\FileTargets',
                'levels' => ['error', 'warning'],
            ]
        ],
        "urlManager" => [
            "enablePrettyUrl" => true,
            "showScriptName" => false,
//            "enableStrictParsing" => true,
        ],
        "request" => [
            "cookieValidationKey" => 'saltkey123',
            "parsers" => [
                'application/json' => 'yii\\web\\JsonParser'
            ]
        ],
        "db" => require(__DIR__ . "/app_mysql.php"),
    ],
    "modules" => [
        'api' => [
            'class' => 'app\\modules\\api\\ApiModule',
            'controllerNamespace' => 'app\\modules\\api\\controllers',
            'components' => [
                "urlManager" => [
                    "class" => \yii\web\UrlManager::className(),
                    "enablePrettyUrl" => true,
                    "showScriptName" => false,
                    "enableStrictParsing" => true,
                    "rules" => [
                        [
                            'class' => 'yii\\rest\\UrlRule'
                        ]
                    ],
                ],
            ]
        ],
    ],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
];