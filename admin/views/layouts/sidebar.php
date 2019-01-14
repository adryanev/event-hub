<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 25/01/18
 * Time: 13:44
 */

use yii\helpers\Html;
$route = $this->context->route;
$controllerName = substr($route,0,strpos($route,'/'));

?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!-- User -->
        <div class="user-box">
            <div class="user-img">

                <img src="<?=Yii::getAlias("@web/images/avatar/").Yii::$app->user->identity->profile_picture?>" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                <div class="user-status online"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#"><?= Yii::$app->user->identity->getFullName() ?></a> </h5>
            <ul class="list-inline">
                <li>
                    <?= Html::a(' <i class="zmdi zmdi-settings"></i>',\yii\helpers\Url::to(['admin/view']),['class'=> 'btn btn-link']) ?>
                </li>

                <li>
                    <?=Html::beginForm(['/site/logout'], 'post');?>
                    <?=Html::submitButton(' <i class="zmdi zmdi-power"></i>', ['class' => 'btn btn-link logout','data' => [
                            'confirm' => 'Apakah anda ingin keluar?',
                            ]]
                    );?>
                    <?=Html::endForm();?>
                </li>
            </ul>
        </div>
        <!-- End User -->


        <!--- Sidemenu -->

        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>
            </ul>

            <?= \common\widgets\Menu::widget(
                    [
                        'items' => [
                            ['label'=>'Beranda', 'icon'=>'zmdi-view-dashboard','url'=>['/site'],'template'=>$controllerName === 'site'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Topik Event', 'icon'=>'zmdi-view-list','url'=>['/topic'],'template'=>$controllerName === 'topic' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Tipe Event', 'icon'=>'zmdi-format-list-bulleted','url'=>['/type'],'template'=>$controllerName === 'type' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Bank', 'icon'=>'zmdi-local-atm','url'=>['/bank'],'template'=>$controllerName === 'bank'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Event Status', 'icon'=>'zmdi-format-list-bulleted','url'=>['/event-status'],'template'=>$controllerName === 'event-status' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Organisasi', 'icon'=>'zmdi-accounts-list','url'=>['/organization'],'template'=>$controllerName === 'organization' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Metode Pembayaran', 'icon'=>'zmdi-card','url'=>['/payment-method'],'template'=>$controllerName === 'payment-method' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Pengguna', 'icon'=>'zmdi-account-circle','url'=>['/pengguna'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Organizer', 'icon'=>'zmdi-accounts','url'=>['/organizer'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Verifkasi Organizer', 'icon'=>'zmdi-file-text','url'=>['/admin'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Pembayaran', 'icon'=>'zmdi-money','url'=>['/pembayaran'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Pengembalian', 'icon'=>'zmdi-money-off','url'=>['/pengembalian'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Pencairan', 'icon'=>'zmdi-money-box','url'=>['/pencairan'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Wallet Pengguna', 'icon'=>'zmdi-balance-wallet','url'=>['/pencairan'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Wallet Organizer', 'icon'=>'zmdi-balance','url'=>['/pencairan'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'API', 'icon'=>'zmdi-code','url'=>['/api'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],

                        ]
                    ]

            ) ?>

        </div>
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
