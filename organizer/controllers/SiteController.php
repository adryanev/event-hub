<?php
namespace organizer\controllers;

use common\models\Organization;
use common\models\StatusKonten;
use common\models\UserOrganizer;
use organizer\models\OrganizerLoginForm;
use organizer\models\OrganizerSignupForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
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
                'rules' => [
                    [
                        'actions' => ['login', 'signup', 'error','terms-of-service','faq'],
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

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='error') $this->layout ='main-not-found';
            if($action->id=='login' || 'signup') $this->layout='main-login';
            return true;
        } else {
            return false;
        }
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->identity->isVerified()){

            return $this->redirect(['account/organizer-verification']);
        }
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

        $model = new OrganizerLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
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

    public function actionSignup(){
        $this->layout = 'main-login';
        Yii::debug('Membuat model signup');

        $model = new OrganizerSignupForm();
        $organization = Organization::findAll([
            'isDeleted'=>StatusKonten::STATUS_ACTIVE
        ]);

        $dataOrg = ArrayHelper::map($organization,'id','name');

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
               $mail = Yii::$app->mailer->compose('organizerEmailVerification-html',['user'=>$user])
                   ->setTo($user->email)
                   ->setFrom([\Yii::$app->params['noReplyEmail'] => \Yii::$app->name . ' robot'])
                   ->setSubject("Signup Confirmation")
                   ->send();

               return $this->render('check-email',['user'=>$user]);
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'organization'=>$dataOrg
        ]);

    }

    public function actionTermsOfService(){

        return $this->render('terms-of-service');
    }

    public function actionFaq(){

        return $this->render('faq');
    }



}
