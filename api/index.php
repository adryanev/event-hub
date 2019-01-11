<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 02/10/17
 * Time: 22:28
 */


// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../common/config/bootstrap.php');

// Use a distinct configuration for the API
$config = \yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/config/api.php',
    require __DIR__ . '/config/api-local.php'
);

(new yii\web\Application($config))->run();