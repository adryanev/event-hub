<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 20/03/19
 * Time: 21:01
 */

namespace common\components;


use Pusher\Pusher;
use Pusher\PusherException;
use Yii;
use yii\base\Component;

class PusherComponent extends Component
{

    public $app_id, $key, $secret, $cluster;

    public $options = [];

    public $defaultEventName='notification';

    /**
     * @var Pusher
     */
    private $_pusher;

    /**
     * @throws \Exception
     */
    public function init()
    {
        parent::init();

        foreach (['app_id','key','secret', 'cluster'] as $attribute){
            if(!$attribute){
                throw new \Exception("Pusher $attribute is required");
            }

        }
        try {
            $this->_pusher = new Pusher($this->key,$this->secret,$this->app_id, $this->options);
        } catch (PusherException $e) {
            Yii::debug($e->getMessage());
        }
    }

    /**
     * @return Pusher
     */
    public function getPusher(){
        return $this->_pusher;
    }

    /**
     * @param $channel
     * @param $event
     * @param $data
     * @param null $socket_id
     * @param bool $debug
     * @param bool $already_encoded
     * @return array|bool
     * @throws PusherException
     */
    public function push($channel, $event, $data){
        return $this->_pusher->trigger($channel,$event,$data);
    }

    /**
     * @param $data
     * @param null $user_id
     * @param null $event
     * @return array|bool
     * @throws PusherException
     */
    public function pushToAdmin($data, $user_id= null, $event=null){

        $event = $event?: $this->defaultEventName;
        return $this->push($this->getAdminChannelName($user_id),$event,$data);
    }

    /**
     * @param $data
     * @param null $user_id
     * @param null $event
     * @return array|bool
     * @throws PusherException
     */
    public function pushToOrganizer($data, $user_id= null, $event=null){

        $event = $event?: $this->defaultEventName;
        return $this->push($this->getOrganizerChannelName($user_id),$event,$data);
    }

    /**
     * @param $data
     * @param null $user_id
     * @param null $event
     * @return array|bool
     * @throws PusherException
     */
    public function pushToParticipant($data, $user_id= null, $event=null){

        $event = $event?: $this->defaultEventName;
        return $this->push($this->getParticipantChannelName($user_id),$event,$data);
    }



    /**
     *    Fetch channel information for a specific channel.
     *
     * @param string $channel The name of the channel
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     * @return object
     * @throws PusherException
     */
    public function get_channel_info($channel, $params = array() )
    {
        return $this->_pusher->get_channel_info($channel, $params);
    }

    /**
     * Fetch a list containing all channels
     *
     * @param array $params Additional parameters for the query e.g. $params = array( 'info' => 'connection_count' )
     *
     * @return array
     * @throws PusherException
     */
    public function get_channels($params = array())
    {
        return $this->_pusher->get_channels($params);
    }


    /**
     * @param null $user_id
     * @return array|mixed|string
     */
    public function getOrganizerChannelName($user_id = null)
    {

        $ids= $user_id?: Yii::$app->user->identity->getId();
        if(!$ids){
            return '';
        }
        $result = [];
        foreach ((array) $ids as $id) {
            $result[] = 'organizer_' . sha1($this->secret . $id);
        }
        return is_array($ids) ? $result : end($result);

    }

    /**
     * @param null $user_id
     * @return array|mixed|string
     */
    public function getAdminChannelName($user_id = null)
    {

        $ids= $user_id?: Yii::$app->user->identity->getId();
        if(!$ids){
            return '';
        }
        $result = [];
        foreach ((array) $ids as $id) {
            $result[] = 'admin_' . sha1($this->secret . $id);
        }
        return is_array($ids) ? $result : end($result);

    }

    /**
     * @param null $user_id
     * @return array|mixed|string
     */
    public function getParticipantChannelName($user_id = null)
    {

        $ids= $user_id?: Yii::$app->user->identity->getId();
        if(!$ids){
            return '';
        }
        $result = [];
        foreach ((array) $ids as $id) {
            $result[] = 'participant_' . sha1($this->secret . $id);
        }
        return is_array($ids) ? $result : end($result);

    }

}