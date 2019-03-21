<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
return [
    'id' => 'app-organizer',
    'name'=> 'Event-Hub Organizer',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'organizer\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'widgetClientOptions' => [
                'buttonsHide' => ['image','file'],
            ]
        ],
    ],
    'components' => [
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => \himiklab\yii2\recaptcha\ReCaptcha::class,
            'siteKey' => $params['keys']['recaptcha_site_key'],
            'secret' => $params['keys']['recaptcha_secret_key'],
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
        'urlManagerAdmin' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            'baseUrl' => Yii::getAlias('@adminBaseUrl'),
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' =>[
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => Yii::getAlias('@frontendBaseUrl'),
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
                    'js'=>['js/jquery.min.js'],
                    'jsOptions'=>['position'=>\yii\web\View::POS_HEAD]

                ],
                'dosamigos\google\maps\MapAsset' => [
                    'options' => [
                        'key' => $params['keys']['google_maps_browser_key2'],
                        'language' => 'id',
                        'version' => '3.1.18'
                    ]
                ]

            ],
        ],
        'formatter' => [

            'datetimeFormat' => 'php:l, d F Y H:i',

            'decimalSeparator' => ',',

            'thousandSeparator' => '.',

            'currencyCode' => 'Rp',

        ],
        'webPusher'=> [
            'class' => 'common\components\PusherComponent',
            'app_id'=>$params['keys']['pusher_app_id'],
            'secret'=>$params['keys']['pusher_secret'],
            'key'=> $params['keys']['pusher_key'],
            'options'=>[
                'cluster'=>$params['keys']['pusher_cluster'],
                'useTLS'=>true
            ],
        ],

            ],
    'params' => $params,
];
