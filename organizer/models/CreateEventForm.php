<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 2/14/2019
 * Time: 8:01 PM
 */

namespace organizer\models;


use Carbon\Carbon;
use common\models\Event;
use yii\base\Model;
use yii\helpers\StringHelper;
use yii\web\UploadedFile;

class CreateEventForm extends Model
{
    const scenario_event_offline = 'event-offline';
    const scenario_event_online = 'event-online';
    public $title;
    public $isOffline;
    public $venueName;
    public $address1;
    public $address2;
    public $country;
    public $province;
    public $city;
    public $coordinate;
    public $dateRange;
    /**
     * @var UploadedFile
     */
    public $eventPoster;
    public $description;
    public $publishingType;
    public $type;
    public $topic;
    public $showRemaining;
    public $instagramLink;
    public $facebookLink;
    public $twitterLink;
    public $eventStatus;
    public $userOrganizer;

    private $_poster_name;
    private $_event;
    private $latitude;
    private $longitude;
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;


    public function rules()
    {
        return [
            [['title','isOffline','venueName','address1','country','province','city','coordinate','dateRange','description',
                'publishingType','type','topic','showRemaining','userOrganizer'], 'required'],
            [['address2','eventPoster','instagramLink','facebookLink','twitterLink','eventStatus'],'safe'],
            [['title','venueName','address1','address2','country','province','city','coordinate','description','publishingType',
                'instagramLink','facebookLink','twitterLink'], 'string'],
            [['isOffline','showRemaining'], 'boolean'],
        ];
    }

    public function scenarios()
    {
        $scenario = parent::scenarios();
        $scenario[self::scenario_event_offline] = [];
        return $scenario;
    }

    public function createEvent(){
        if(!$this->validate()) return false;
        $modelEvent = new Event();
        $modelEvent->title = $this->title;
        $modelEvent->is_offline = $this->isOffline;
        $modelEvent->venue_name = $this->venueName;
        $modelEvent->address_1 = $this->address1;
        $modelEvent->address_2 = $this->address2;
        $this->setLatLong($this->coordinate);
        $this->setDateTime($this->dateRange);
        if($this->uploadPoster()){
            $modelEvent->event_poster = $this->_poster_name;
        }
        $modelEvent->description = $this->description;
        $modelEvent->publishing_type = $this->publishingType;
        $modelEvent->type = $this->type;
        $modelEvent->topic = $this->topic;
        $modelEvent->show_remaining = $this->showRemaining;
        $modelEvent->instagram_link = $this->instagramLink;
        $modelEvent->facebook_link = $this->facebookLink;
        $modelEvent->event_status = $this->eventStatus;
        $modelEvent->user_organizer = \Yii::$app->user->identity->getId();

        if($modelEvent->save()){
            return true;
        }
        else{
            \Yii::debug($modelEvent->getErrors());
            return false;
        }


    }

    private function setLatLong($coordinate){
        $cord = StringHelper::explode($coordinate,'@');
        $this->latitude = $cord[0];
        $this->longitude = $cord[1];
    }

    private function setDateTime($dateRange){

    }

    private function getEncodedTitle($title){
        $titleEncoded = preg_replace($title,'_',' ');
        return $titleEncoded;
    }

    private function uploadPoster(){
        if(is_null($this->profile_picture) || empty($this->profile_picture)) return false;
        $path = \Yii::getAlias('@organizer/web/images/events');
        $fileName = 'event' . '-' . $this->getEncodedTitle($this->title) . '-' . Carbon::now()->timestamp . '.' . $this->eventPoster->getExtension();
        $this->_poster_name = $fileName;
        if ($this->eventPoster->saveAs($path . '/' . $fileName )) {
            return true;
        } else return false;
    }


}