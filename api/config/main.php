<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 02/10/17
 * Time: 22:29
 */

use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'event-hub-api',
    'name' => 'Event-hub API',
    // Need to get one level up:
    'basePath' => dirname(__DIR__).'/..',
    'bootstrap' => ['log'],
    'components' => [
        'response' => [
            'formatters' => [
                    Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
            'format' => Response::FORMAT_JSON,

        ],
        'request' => [
            // Enable JSON Input:
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'api\models\ApiIdentity',
            'enableAutoLogin' => false,
            'enableSession'=>false,
            'loginUrl'=>null
        ],
    ],
    'modules' => [
        'v1' => [
	        'basePath' => '@api/modules/v1',
            'class' => 'api\modules\v1\Module',
        ],
    ],
    'params' => $params,
];

return $config;