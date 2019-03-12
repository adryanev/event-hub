<?php
namespace admin\controllers;

use admin\models\AdminLoginForm;
use organizer\models\OrganizerSignupForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'=>['login','error','logout','index'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='error') $this->layout ='main-not-found';
            if($action->id=='login') $this->layout='main-login';
            return true;
        } else {
            return false;
        }
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

//    public function actionCreateWalletOrganizer($id){
//        $model = new OrganizerSignupForm();
//        $wallet = $model->createOrganizerWallet($id);
//
//        if(!is_null($wallet)){
//            Yii::$app->session->setFlash('warning','gagal menambahkan wallet');
//        }
//        else{
//            Yii::$app->session->setFlash('success','Berhasil mnambahkan wallet');
//        }
//        return $this->render('index');
//    }
}
