<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
$ini = parse_ini_file(__DIR__ . '/../../keys.ini');
return [
    'id' => 'app-organizer',
    'name'=> 'Event-Hub Organizer',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'organizer\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => \himiklab\yii2\recaptcha\ReCaptcha::class,
            'siteKey' => $ini['recaptcha_site_key'],
            'secret' => $ini['recaptcha_secret_key'],
        ],
        'request' => [
            'csrfParam' => '_csrf-organizer',
        ],
        'user' => [
            'identityClass' => 'common\models\UserOrganizer',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-organizer', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the admin
            'name' => 'event-hub-organizer',
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
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' =>[
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js'=>['js/jquery.js'],
                    'jsOptions' => [ 'position' => \yii\web\View::POS_HEAD ],
                ],

            ],
        ],
        'formatter' => [

            'datetimeFormat' => 'php:l, d F Y H:i',

            'decimalSeparator' => ',',

            'thousandSeparator' => '.',

            'currencyCode' => 'Rp',

        ],
            ],
    'params' => $params,
];
