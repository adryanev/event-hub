<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/17/2019
 * Time: 5:06 PM
 */

namespace organizer\controllers;


use admin\models\NotificationAdmin;
use Carbon\Carbon;
use common\models\Bank;
use common\models\Notification;
use common\models\Organization;
use common\models\StatusKonten;
use common\models\UserOrganizer;
use organizer\models\OrganizerVerificationForm;
use organizer\models\OrganizerVerificationUploadForm;
use Pusher\Pusher;
use Pusher\PusherException;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;

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
        $model = new OrganizerVerificationForm();
        $model2 = new OrganizerVerificationUploadForm();
        $dataType = Organization::getOrganizationAsKeyValue();
        $dataBank = Bank::getBankAsKeyValue();
        $mapsApi = Yii::$app->params['keys']['google_maps_browser_key2'];
        if($post = Yii::$app->request->post()){

        if ($model->load($post) && $model2->load($post)) {
            $model->profile_picture = UploadedFile::getInstance($model,'profile_picture');
            if($model->saveOrganizer()){
                $model2->verificationFiles = UploadedFile::getInstances($model2,'verificationFiles');
                if($model2->saveToDb()){
                    Yii::$app->getSession()->setFlash('success','Berhasil Request Verifikasi Akun');
                    $this->sendNotification($model->getOrganizer()->id);
                    return $this->goHome();
                }
            }
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

    protected function sendNotification($id){

        $channel = 'admin-channel';
        $event = 'notification';
        $notification = new Notification();
        $notification->from = UserOrganizer::findOne($id)->name;
        $notification->image = 'info';
        $notification->time = Carbon::now()->timestamp;
        $notification->message = 'Meminta verifikasi organizer.';
        $notification->urlAction= Yii::$app->urlManagerAdmin->createAbsoluteUrl(['verifikasi-organizer/index']);

        $notifAdmin = new NotificationAdmin();
        $notifAdmin->channel = $channel;
        $notifAdmin->event = $event;
        $notifAdmin->messages = $notification->message;
        $notifAdmin->action = $notification->urlAction;
        $notifAdmin->from = $notification->from;



      return Yii::$app->webPusher->pushToOrganizer($notification->encode(),$id);

    }


}