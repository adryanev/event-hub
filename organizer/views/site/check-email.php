<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/17/2019
 * Time: 5:17 PM
 */
/* @var $user \common\models\UserOrganizer */


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
            <h4 class="text-uppercase font-bold m-b-0">Konfirmasi Email</h4>
        </div>
        <div class="panel-body text-center">
            <img src="<?=Yii::getAlias('@web/images/mail_confirm.png')?>" alt="img" class="thumb-lg m-t-20 center-block" />
            <p class="text-muted font-13 m-t-20"> Sebuah email telah dikirimkan ke alamat <b><?=$user->email?></b>. Silahkan cek email anda dan tekan tombol konfirmasi email untuk mengkonfirmasi email anda. </p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Kembali ke halaman <?=\yii\helpers\Html::a(
                '<b>login</b>', \yii\helpers\Url::to(['site/login']),['class'=>'text-primary m-1-5'])?></p>
        </div>
    </div>

</div>
<!-- end wrapper page -->




<script>
    var resizefunc = [];
</script>


