<!-- Navigation Bar-->
<?php $route = $this->context->route;
$controllerName = substr($route,0,strpos($route,'/'));

use yii\helpers\Html; ?>
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo"><span>Event<span>Hub</span></span> Organizer</a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li>
                        <form role="search" class="navbar-left app-search pull-left hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    <li>
                        <!-- Notification -->
                        <div class="notification-box">
                            <ul class="list-inline m-b-0">
                                <li>
                                    <a href="javascript:void(0);" class="right-bar-toggle">
                                        <i class="zmdi zmdi-notifications-none"></i>
                                    </a>
                                    <div class="noti-dot">
                                        <span class="dot"></span>
                                        <span class="pulse"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- End Notification bar -->
                    </li>

                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                            <?=\yii\helpers\Html::img(Yii::getAlias('@organizerImage/avatar/'.Yii::$app->user->identity->profile_picture),['alt'=>'user-img', 'class'=>'img-circle user-img'])?>
                            <div class="user-status online"><i class="zmdi zmdi-dot-circle"></i></div>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-money m-r-5"></i> Wallet <span><p class="text-success"> <?=Yii::$app->formatter->asCurrency(Yii::$app->user->identity->hubWalletOrganizers->balance,'IDR')?></p></span></a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                            <li>
                                <?= Html::a(
                                    '<i class="ti-power-off m-r-5"></i> Logout',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

        </div>
    </div>

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="<?= $controllerName === 'site'? 'active': ''?>">
                        <?=\yii\helpers\Html::a('<i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> ',\yii\helpers\Url::to(['site/index']))?>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-invert-colors"></i> <span> Event </span> </a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <?=Html::a('Buat Event',\yii\helpers\Url::to(['event/create']))?>
                                    <li>
                                        <?=Html::a('Event Saya',\yii\helpers\Url::to(['event/index']))?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-view-list"></i> <span> Laporan </span> </a>
                        <ul class="submenu">
                            <li>
                                <?=Html::a('Summary',\yii\helpers\Url::to(['laporan/summary']))?>
                                </li>
                            <li>
                                <?=Html::a('Detail',\yii\helpers\Url::to(['laporan/detail']))?>
                            </li>
                            <li>
                                <?=Html::a('Feedback',\yii\helpers\Url::to(['laporan/feedback']))?>
                            </li>
                        </ul>
                    </li>


                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->