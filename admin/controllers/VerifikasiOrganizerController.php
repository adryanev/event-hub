<?php

namespace admin\controllers;
use admin\models\OrganizerVerificationSearch;
use Carbon\Carbon;
use common\models\Notification;
use common\models\StatusKonten;
use common\models\UserOrganizer;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
use organizer\models\NotificationOrganizer;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VerifikasiOrganizerController extends Controller
{
    public function behaviors(){

        return[
            'verbs'=>[
                'class'=> VerbFilter::class,
                'actions'=>[
                    'delete'=>['POST'],
                    'approve'=>['POST'],
                    'reject'=>['POST']
                ]
            ]
        ];
    }

    public function actionIndex(){
        $searchModel = new OrganizerVerificationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionView($id){

        $model = $this->findModel($id);
        $verificationData = new OrganizerVerificationSearch();
        $dataProvider = $verificationData->verificationData($id);
        $location = new LatLng(['lat'=>$model->latitude, 'lng'=>$model->longitude]);
        $map = new Map([
            'center'=>$location,
            'zoom'=>15
        ]);
        $marker = new Marker([
            'position'=>$location,
            'title'=> $model->name
        ]);
        $map->addOverlay($marker);
        return $this->render('view',['model'=>$model,'map'=>$map,'dataProvider'=>$dataProvider]);
    }

    public function actionApprove($id){
        $modelOrganizer = $this->findModel($id);
        $modelOrganizer->setIsVerified(StatusKonten::STATUS_VERIFIED);
        $modelOrganizer->setVerificationStatus(StatusKonten::ORGANIZER_VERIFIED);
        $modelOrganizer->save(false);
        $this->sendNotification($id,'success');
        Yii::$app->getSession()->setFlash('success','Berhasil Verifikasi Organizer');
        return $this->redirect('index');


    }

    public function actionReject($id){
        $modelOrganizer = $this->findModel($id);
        $modelOrganizer->setIsVerified(StatusKonten::STATUS_NOT_VERIFIED);
        $modelOrganizer->setVerificationStatus(StatusKonten::ORGANIZER_NOT_VERIFIED);
        $modelOrganizer->save(false);
        $this->sendNotification($id,'failed');
        Yii::$app->getSession()->setFlash('success','Verifikasi Organizer Ditolak');
        return $this->redirect('index');
    }

    protected function findModel($id){
        if( ($model = UserOrganizer::findOne($id)) !=null){
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }


    /**
     * @param $id
     * @param $status
     * @return mixed
     */
    protected function sendNotification($id, $status){
        $notification = new Notification();
        $modelNotif = new NotificationOrganizer();

        $notification->from = 'Admin Event-Hub';
        $notification->time = Carbon::now()->timestamp;
        $notification->urlAction = Yii::$app->urlManagerOrganizer->createAbsoluteUrl(['notification/index']);
        $notification->image = 'info';
        switch ($status){
            case 'success': $notification->message = 'Permintaan verifikasi anda telah disetujui.'; break;
            case 'failed': $notification->message = 'Permintaan verifikasi anda ditolak, silahkan ajukan kembali'; break;
        }

        $modelNotif->channel = Yii::$app->webPusher->getOrganizerChannelName($id);
        $modelNotif->event = 'notification';
        $modelNotif->action = $notification->urlAction;
        $modelNotif->organizer = $id;
        $modelNotif->messages = $notification->message;
        $modelNotif->from = $notification->from;
        $modelNotif->created_at = $notification->time;
        $modelNotif->updated_at = $notification->time;
       return Yii::$app->webPusher->pushToOrganizer($notification->encode(), $id);


    }


}