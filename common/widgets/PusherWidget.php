<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 20/03/19
 * Time: 21:29
 */

namespace common\widgets;


use common\assets\PusherAsset;
use common\components\PusherComponent;
use Yii;
use yii\base\Widget;
use yii\bootstrap\Html;
use yii\helpers\Json;
use yii\web\View;

class PusherWidget extends Widget
{

    /**
     * JS events array with pusher event names as keys
     * @example ['notification' => new \yii\web\JsExpression("function(data){console.log(data);}")]
     * @var array
     */
    public $events = [];
    public $system = [];
    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var PusherComponent $pusher */
        $pusher = Yii::$app->webPusher;
        Yii::$app->view->registerAssetBundle(PusherAsset::className());

        $channels =[];

        switch ($this->system[0]){
            case 'admin':
                $channels[] ='admin-channel';
                $channels[] = $pusher->getAdminChannelName();
                break;
            case 'organizer':
                $channels[] ='organizer-channel';
                $channels[] = $pusher->getOrganizerChannelName();
                break;

            case 'participant':

                $channels[] ='participant-channel';
                $channels[] = $pusher->getParticipantChannelName();

                break;
        }
        Yii::$app->view->registerJs(
            <<<JS
    var pusher = new Pusher("{$pusher->key}",{
        cluster: "{$pusher->options['cluster']}",
        forceTLS: true
    });
JS
            , View::POS_READY);

        foreach ($channels as $key=> $channel){
            $js = <<<JS
                var channel_{$key} = pusher.subscribe("{$channel}");
                channel_{$key}.bind("{$this->events[0]}",function (data) {
                    showNotification(data);
                });
JS;

            Yii::$app->view->registerJs($js,View::POS_READY);
        }

        return Html::tag('div', $channels[1], ['id' => 'pusher-channel', 'class' => 'hide']);
    }

}