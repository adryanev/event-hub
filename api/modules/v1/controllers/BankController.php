<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/12/2019
 * Time: 5:47 PM
 */

namespace api\modules\v1\controllers;
use common\extensions\auth\ApiAuth;
use common\models\Bank;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\rest\ActiveController;

class BankController extends ActiveController
{

    public $modelClass = Bank::class;
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }
    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }


    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Bank::find(),
            'pagination'=>false
        ]);
    }





}