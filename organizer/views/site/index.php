<?php

/* @var $this yii\web\View */

$this->title = 'Event-Hub Dashboard';
?>

<h4 class="page-title"><?=$this->title?></h4>
<?php if(Yii::$app->user->identity->verification_status === \common\models\StatusKonten::ORGANIZER_NOT_VERIFIED) : ?>
    <div class="alert alert-danger">
        <p>Akun anda harus diverifikasi admin agar bisa digunakan. <?=\yii\helpers\Html::a('Ajukan Verifikasi',\yii\helpers\Url::to(['account/organizer-verification']))?></p>
    </div>
<?php elseif(Yii::$app->user->identity->verification_status === \common\models\StatusKonten::ORGANIZER_PENDING):?>
    <div class="alert alert-info">
        <p>Status Verifikasi akun anda pending, anda belum bisa membuat event.</p>
    </div>
<?php endif; ?>

<div class="card-box">
    <div class="card-content">
        <div class="site-index">

            <div class="jumbotron">
                <h1>Congratulations!</h1>

                <p class="lead">You have successfully created your Yii-powered application.</p>

                <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
            </div>

            <div class="body-content">

                <div class="row">
                    <div class="col-lg-4">
                        <h2>Heading</h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>

                        <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                    </div>
                    <div class="col-lg-4">
                        <h2>Heading</h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>

                        <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
                    </div>
                    <div class="col-lg-4">
                        <h2>Heading</h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>

                        <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
