<?php

namespace admin\assets;

use common\assets\NpmAsset;
use yii\web\AssetBundle;

/**
 * Main admin application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/core.css',
        'css/components.css',
        'css/icons.css',
        'css/pages.css',
        'css/menu.css',
        'css/responsive.css',
        'css/variables.css',
        'plugins/jquery-ui/jquery-ui.css',
        'plugins/css/animate.css',
        'plugins/toastr/toastr.min.css',

    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/yii_override.js',
        'js/detect.js',
        'plugins/waypoints/lib/jquery.waypoints.js',
        'plugins/counterup/jquery.counterup.min.js',
        'js/fastclick.js',
        'js/jquery.blockUI.js',
        'js/jquery.nicescroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.slimscroll.js',
        'js/modernizr.min.js',
        'js/waves.js',
        'js/wow.min.js',
        'plugins/jquery-knob/jquery.knob.js',
        'plugins/jquery-ui/jquery-ui.js',
        'plugins/raphael/raphael-min.js',
        'plugins/moment/moment.js',
        'plugins/toastr/toastr.min.js',
        'js/jquery.core.js',
        'js/jquery.app.js',

    ];
    public $depends = [
        NotificationAsset::class,
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii2mod\alert\AlertAsset',
        NpmAsset::class,
    ];
}
