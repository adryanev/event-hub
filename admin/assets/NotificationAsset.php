<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/25/2019
 * Time: 8:41 PM
 */

namespace admin\assets;


use common\assets\PusherAsset;
use yii\web\AssetBundle;
use yii\web\View;

class NotificationAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'plugins/lowLag/lowLag.js',
        'plugins/lowLag/soundmanager2-jsmin.js'
    ];

    public function init() {

        $this->jsOptions['position'] = View::POS_HEAD;

        parent::init();

    }
    public $depends = [
        PusherAsset::class
    ];

}