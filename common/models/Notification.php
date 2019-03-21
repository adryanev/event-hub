<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 21/03/19
 * Time: 12:30
 */

namespace common\models;


use yii\base\BaseObject;

class Notification extends BaseObject
{

    public  $from,$time, $message, $urlAction, $image;

    /**
     * @return mixed
     */
    public function encode(){

        $data['from'] = $this->from;
        $data['time'] = $this->time;
        $data['message'] = $this->message;
        $data['action'] = $this->urlAction;
        $data['image'] = $this->image;

        return $data;

    }
}