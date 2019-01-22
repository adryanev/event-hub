<?php

namespace organizer\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main admin application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/components.css',
        'css/core.css',
        'css/icons.css',
        'css/menu.css',
        'css/pages.css',
        'css/responsive.css',
        'css/variables.css',
        'css/pace-theme-flash.css',
        'plugins/jquery-ui/jquery-ui.css',
        'plugins/css/animate.css',

    ];
    public $js = [

        'js/detect.js',
        'js/yii_override.js',
        'plugins/waypoints/lib/jquery.waypoints.js',
        'plugins/counterup/jquery.counterup.min.js',
        'js/fastclick.js',
        'js/jquery.blockUI.js',
        'js/jquery.nicescroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.slimscroll.js',
        'js/pace.min.js',
        'js/waves.js',
        'js/wow.min.js',
        'plugins/jquery-knob/jquery.knob.js',
        'plugins/jquery-ui/jquery-ui.js',
        'plugins/raphael/raphael-min.js',
        'plugins/moment/moment.js',
        'plugins/bootstrap-wizard/jquery.bootstrap.wizard.js',
        'js/jquery.app.js',
        'js/jquery.core.js',

    ];
    public $depends = [
        JqueryAsset::class,
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii2mod\alert\AlertAsset',
    ];
}
