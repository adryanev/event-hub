<?php

namespace admin\controllers;
use admin\models\OrganizerVerificationSearch;
use common\models\StatusKonten;
use common\models\UserOrganizer;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\overlays\Marker;
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
        $modelOrganizer = UserOrganizer::findOne($id);
        $modelOrganizer->setIsVerified(StatusKonten::STATUS_VERIFIED);
        $modelOrganizer->setVerificationStatus(StatusKonten::ORGANIZER_VERIFIED);
        $modelOrganizer->save(false);
        Yii::$app->getSession()->setFlash('success','Berhasil Verifikasi Organizer');
        return $this->redirect('index');


    }

    public function actionReject($id){
        Yii::$app->getSession()->setFlash('success','Verifikasi Organizer Ditolak');
        return $this->redirect('index');
    }

    protected function findModel($id){
        if( ($model = UserOrganizer::findOne($id)) !=null){
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');

    }
}