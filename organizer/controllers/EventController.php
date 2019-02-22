<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 2/13/2019
 * Time: 12:21 PM
 */

namespace organizer\controllers;


use common\models\Event;
use organizer\models\CreateEventForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;

class EventController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create','detail','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex(){
        $events = Event::find()->where(['user_organizer'=>\Yii::$app->getUser()->getIdentity()->getId()]);
        return $this->render('index',['events'=>$events]);
    }
    public function actionCreate(){

        $model = new CreateEventForm();
        return $this->render('create-event',['model'=>$model]);

    }
    public function actionDetail($id){

    }
    public function actionDelete($id){

    }

}