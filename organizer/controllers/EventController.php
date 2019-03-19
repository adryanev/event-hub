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
use common\models\Model;
use common\models\StatusKonten;
use common\models\Ticketing;
use common\models\Topic;
use common\models\Type;
use organizer\models\CreateEventForm;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;

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

        if(\Yii::$app->user->identity->verification_status === StatusKonten::ORGANIZER_PENDING){
            return $this->redirect(['site/index']);
        }
        $model = new CreateEventForm();
        $modelsTicket = [new Ticketing];
        $dataTopic = Topic::getTopicAsKeyValue();
        $dataType = Type::getTypeAsKeyValue();

        if($model->load(\Yii::$app->request->post())){
            $modelsTicket = Model::createMultiple(Ticketing::class);
            Model::loadMultiple($modelsTicket,\Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsTicket),
                    ActiveForm::validate($model)
                );
            }

            //Validate All model
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTicket) && $valid;
            if($valid){
                $transaction = Yii::$app->db->beginTransaction();
                try{
                    if($flag = $model->createEvent()){
                        foreach ($modelsTicket as $modelTicket){
                            $modelTicket->id_event = $flag->id;
                            if(!($flagTicket = $modelTicket->save(false))){
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if($flag){
                        $transaction->commit();
                        return $this->redirect(['view','id'=>$flag->id]);
                    }
                }
                catch (\Exception $e){
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create-event',['model'=>$model,
            'modelTicket'=> (empty($modelsTicket)) ? [new Ticketing] : $modelsTicket,
            'dataTopic'=>$dataTopic,
            'dataType'=>$dataType]);

    }

    public function actionUpdate($id){

    }
    public function actionDetail($id){

    }
    public function actionDelete($id){

    }

}