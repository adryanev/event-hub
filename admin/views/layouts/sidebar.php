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
                            ['label'=>'Topik', 'icon'=>'zmdi-map','url'=>['/topic'],'template'=>$controllerName === 'topic' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Bank', 'icon'=>'zmdi-file-text','url'=>['/bank'],'template'=>$controllerName === 'bank'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Type', 'icon'=>'zmdi-accounts','url'=>['/type'],'template'=>$controllerName === 'type' ? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],
                            ['label'=>'Admin', 'icon'=>'zmdi-account','url'=>['/admin'],'template'=>$controllerName === 'admin'? '<a href="{url}" class="waves-effect active">{icon} {label}</a>': '<a href="{url}" class="waves-effect">{icon} {label}</a>'],

                        ]
                    ]

            ) ?>

        </div>
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
