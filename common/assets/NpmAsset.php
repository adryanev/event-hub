<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 21/03/19
 * Time: 13:22
 */

namespace common\assets;


use yii\web\AssetBundle;

class NpmAsset extends AssetBundle
{
    public $basePath = '@npm';

    public $css = [];

    public $js = [
        'moment/moment.js',
        'moment/local/id.js',
    ];
}