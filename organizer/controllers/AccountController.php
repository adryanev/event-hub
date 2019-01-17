<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/17/2019
 * Time: 5:06 PM
 */

namespace organizer\controllers;


use common\models\StatusKonten;
use common\models\UserOrganizer;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class AccountController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['confirm'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['activated'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    public function actionConfirm($id,$key){
        $this->layout = 'main-login';
        $user = UserOrganizer::findOne(['id'=>$id, 'auth_key'=>$key, 'isDeleted'=>StatusKonten::STATUS_DELETED]);
        if(!is_null($user) || !empty($user)){
            $user->isDeleted = StatusKonten::STATUS_ACTIVE;
            $user->save();
            Yii::$app->session->setFlash('success',"Selamat akun anda berhasi di konfirmasi");

        }
        else{
            Yii::$app->getSession()->setFlash('warning','Gagal Konfirmasi Akun!');
        }
        return $this->render('activated');
    }

    public function actionOrganizerVerification(){


        return $this->render('verification');
    }

}