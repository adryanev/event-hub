<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \organizer\models\OrganizerSignupForm */

use yii2mod\alert\Alert;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='zmdi zmdi-account-circle form-control-feedback'></span>{input}"
];

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='zmdi zmdi-email form-control-feedback'></span>{input}"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "<span class='zmdi zmdi-lock form-control-feedback'></span>{input}"
];
$this->title = 'Signup Organizer'
?>


<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="<?=Yii::$app->urlManager->getBaseUrl()?>" class="logo"><span>Event-Hub<span> Organizer</span></span></a>
        <h5 class="text-muted m-t-0 font-600">Oragnizer Dashboard Aplikasi Event-Hub</h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="panel-body">

            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>


            <?= $form
                ->field($model, 'name', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

            <?= $form
                ->field($model, 'email', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
            <?= $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

            <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha::class)->label('') ?>


            <div class="form-group">
                <?= Html::submitButton('Signup', ['class'=>['btn btn-primary waves-effect waves-light btn-bordred col-xs-12'], 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>
    <!-- end card-box-->

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-white">Tidak punya akun? <?=Html::a('<b>Daftar</b>',\yii\helpers\Url::to(['site/signup']),['class'=>'text-primary m-l-5'])?>! </p>
        </div>
    </div>

</div>
<!-- end wrapper page -->



<script>
    var resizefunc = [];
</script>

