<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 2/12/2019
 * Time: 5:00 PM
 */

namespace admin\controllers;


use admin\models\NotificationAdmin;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class NotificationController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    public function actionIndex(){
        $model = NotificationAdmin::find()->orderBy('created_at desc')->all();
        return $this->render('index',['notifications'=>$model]);

    }
}