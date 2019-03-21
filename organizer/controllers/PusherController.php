<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 20/03/19
 * Time: 20:58
 */

namespace organizer\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class PusherController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['auth'],
                        'allow' => true,
                    ],

                ],
            ],

        ];
    }
    public function actionAuth(){

    }
}