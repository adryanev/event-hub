<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/22/2019
 * Time: 10:23 PM
 */

namespace organizer\assets;


use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\View;

class JqueryStepsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/jquery.steps.js'
    ];

    public $depends = [
        BootstrapAsset::class,
        JqueryAsset::class

    ];
    public function init() {

        $this->jsOptions['position'] = View::POS_HEAD;

        parent::init();

    }
}