<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/25/2019
 * Time: 6:24 PM
 */

namespace common\assets;


use yii\web\AssetBundle;
use yii\web\View;

class PusherAsset extends AssetBundle
{

    public $js = [
        'https://js.pusher.com/4.3/pusher.min.js'

    ];

    public function init() {

        $this->jsOptions['position'] = View::POS_HEAD;

        parent::init();

    }
}