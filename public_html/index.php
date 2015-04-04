<?php

ini_set("dispay_errors", 1);
error_reporting(E_ALL | E_STRICT);

defined('YII_DEBUG') or define('YII_DEBUG', true);

require(__DIR__ . "/../vendor/yiisoft/yii2/Yii.php");

require(__DIR__ . "/../vendor/autoload.php");

$config = require(__DIR__ . "/../configs/app_config.php");

(new yii\web\Application($config))->run();