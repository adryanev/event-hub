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
if($controllerName == 'site'){
    $controllerName = "Dashboard";
}
?>
<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="<?=Yii::$app->urlManager->getBaseUrl()?>" class="logo"><span>Penilaian<span>DesKel</span></span><i class="zmdi zmdi-layers"></i></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left">
                            <i class="zmdi zmdi-menu"></i>
                        </button>
                    </li>
                    <li>
                        <h4 class="page-title"><?=ucwords($controllerName)?></h4>
                    </li>
                </ul>

                <!-- Right(Notification and Searchbox -->
<!--                <ul class="nav navbar-nav navbar-right">-->
<!--                    <li>-->
<!--                        <!-- Notification -->
<!--                        <div class="notification-box">-->
<!--                            <ul class="list-inline m-b-0">-->
<!--                                <li>-->
<!--                                    <a href="javascript:void(0);" class="right-bar-toggle">-->
<!--                                        <i class="zmdi zmdi-notifications-none"></i>-->
<!--                                    </a>-->
<!--                                    <div class="noti-dot">-->
<!--                                        <span class="dot"></span>-->
<!--                                        <span class="pulse"></span>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        <!-- End Notification bar -->
<!--                    </li>-->
<!--                    <li class="hidden-xs">-->
<!--                        <form role="search" class="app-search">-->
<!--                            <input type="text" placeholder="Search..."-->
<!--                                   class="form-control">-->
<!--                            <a href=""><i class="fa fa-search"></i></a>-->
<!--                        </form>-->
<!--                    </li>-->
<!--                </ul>-->

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->

