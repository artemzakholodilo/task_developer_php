<?php

return [
    'id' => 'app-console',
    'basePath' => __DIR__ . '/../console',
    'controllerNamespace' => 'yii\console\controllers',
    'components' => [
        'db' => require(__DIR__ . "/app_mysql.php"),
        "authManager" => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest']
        ],
    ]
];
