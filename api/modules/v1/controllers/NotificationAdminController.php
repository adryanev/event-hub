<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/26/2019
 * Time: 10:52 AM
 */

namespace api\modules\v1\controllers;


use admin\models\NotificationAdmin;
use common\extensions\auth\ApiAuth;
use common\models\StatusKonten;
use yii\rest\ActiveController;

class NotificationAdminController extends ActiveController
{
    public $modelClass = NotificationAdmin::class;
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public static function allowedDomains()
    {
        return [
            // '*',                        // star allows all domains
            'http://admin.event-hub.test',
            'http://organizer.event-hub.test',
            'http://event-hub.test',
            'http://localhost',
        ];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class'=>ApiAuth::className()
//        ];
        $behaviors['corsFilter'] =[
            'class' => \yii\filters\Cors::className(),
            'cors'  => [
                // restrict access to domains:
                'Origin'                           => static::allowedDomains(),
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)

            ],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }
}