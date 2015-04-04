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
        ],
        "request" => [
            "cookieValidationKey" => 'saltkey123'
        ],
        "db" => require(__DIR__ . "/app_mysql.php"),
    ],
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
];