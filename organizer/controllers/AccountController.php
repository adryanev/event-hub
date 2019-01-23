<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/17/2019
 * Time: 5:06 PM
 */

namespace organizer\controllers;


use common\models\Bank;
use common\models\Organization;
use common\models\StatusKonten;
use common\models\UserOrganizer;
use organizer\models\OrganizerVerificationUploadForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
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
                        'actions' => ['organizer-verification'],
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
            $user->save(false);
            Yii::$app->session->setFlash('success',"Selamat akun anda berhasi di konfirmasi");

        }
        else{
            Yii::$app->getSession()->setFlash('warning','Gagal Konfirmasi Akun!');
        }
        return $this->render('activated');
    }

    public function actionOrganizerVerification(){
        $this->layout = 'main-login';
        $model = new \organizer\models\OrganizerVerificationForm(['scenario' => 'verification']);
        $model2 = new OrganizerVerificationUploadForm();
        $dataType = Organization::getOrganizationAsKeyValue();
        $dataBank = Bank::getBankAsKeyValue();
        $mapsApi = Yii::$app->params['keys']['google_maps_browser_key2'];

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('organizer-verification', [
            'model' => $model,
            'model2'=> $model2,
            'dataType'=>$dataType,
            'dataBank'=>$dataBank,
            'mapsApi'=>$mapsApi,
        ]);
    }

    public function actionUploadAjax(){

    }

}