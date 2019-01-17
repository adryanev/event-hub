<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/17/2019
 * Time: 5:11 PM
 */

?>


<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="<?=Yii::$app->urlManager->getBaseUrl()?>" class="logo"><span>Event-Hub<span> Organizer</span></span></a>
        <h5 class="text-muted m-t-0 font-600">Oragnizer Dashboard Aplikasi Event-Hub</h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">Email Berhasil diverifikasi.</h4>
        </div>
        <div class="panel-body text-center">
            <p class="text-muted font-13 m-t-20"> Silahkan login untuk memulai menggunakan aplikasi. </p>
            <?= \yii\helpers\Html::a('Login',\yii\helpers\Url::to(['site/login']),['class'=>'btn btn-success waves-effect waves-light'])?>

        </div>
    </div>

</div>
<!-- end wrapper page -->




<script>
    var resizefunc = [];
</script>

