<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
$posTag = strpos($name,'#');
$substring = substr($name,$posTag+1,'3');
?>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <div class="text-error"><?= Html::encode($substring) ?></div>
        <h3 class="text-uppercase font-600"><?= Html::encode($message) ?></h3>
        <p class="text-muted">
            Halaman yang anda cari tidak ditemukan.
            Mohon hubungi kami jika ini merupakan kesalahan pada server. Terima Kasih.
        </p>
        <br>
        <?=Html::a('Kembali',Url::toRoute(['site/index']),['class'=>'btn btn-primary waves-effect waves-light']) ?>
    </div>
</div>
<!-- End wrapper page -->