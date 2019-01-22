<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/17/2019
 * Time: 5:46 PM
 */

namespace organizer\models;


use Carbon\Carbon;
use common\models\Bank;
use common\models\Organization;
use common\models\UserOrganizer;
use yii\base\Model;
use yii\web\UploadedFile;

class OrganizerVerificationForm extends Model
{

    public $name;
    public $email;
    public $organization_type;
    public $address_1;
    public $address_2;
    public $country;
    public $province;
    public $city;
    public $latitude;
    public $longitude;
    public $postal_code;
    /**
     * @var UploadedFile
     */
    public $profile_picture;
    public $work_phone;
    public $cell_phone;
    public $description;
    public $twitter;
    public $instagram;
    public $facebook;
    public $whatsapp;
    public $website;
    public $bank_name;
    public $bank_account;
    public $terms = false;

    private $_organizer;
    private $_profile_file;

    public function rules()
    {
        return [
            [['name', 'email','terms', 'organization_type', 'address_1', 'country', 'province', 'city', 'postal_code', 'work_phone', 'description'], 'required'],
            [['address_2', 'longitude', 'latitude', 'profile_picture', 'cell_phone', 'twitter', 'instagram', 'facebook', 'whatsapp', 'website', 'bank_name', 'bank_account'], 'safe'],
            [['latitude', 'longitude'], 'number'],
            ['terms','boolean'],
            [['email', 'name', 'description', 'twitter', 'instagram', 'facebook', 'website', 'bank_account'], 'string', 'max' => 255],
            [['country', 'province', 'city'], 'string', 'max' => 32],
            ['profile_picture', 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
            [['postal_code'], 'string', 'max' => 6],
            [['work_phone', 'cell_phone', 'whatsapp'], 'string', 'max' => 16],
            [['email'], 'unique'],
            [['bank_name'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_name' => 'id']],
            [['organization_type'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_type' => 'id']],

        ];
    }

    public function getOrganizer()
    {
        if ($this->_organizer === null) {
            $organizer = UserOrganizer::findOne(['id' => \Yii::$app->user->identity->getId()]);
            $this->_organizer = $organizer;
        }

        return $this->_organizer;

    }

    public function saveOrganizer()
    {
        if (!$this->validate()) return false;
        $organizer = $this->getOrganizer();
        $organizer->scenario = UserOrganizer::SCENARIO_VERIFICATION;
        $organizer->setName($this->name);
        $organizer->setEmail($this->email);
        $organizer->setAddress1($this->address_1);
        $organizer->setAddress2($this->address_2);
        $organizer->setOrganizationType($this->organization_type);
        $organizer->setCountry($this->country);
        $organizer->setProvince($this->province);
        $organizer->setCity($this->city);
        $organizer->setPostalCode($this->postal_code);
        $organizer->setLatitude($this->latitude);
        $organizer->setLongitude($this->longitude);
        $organizer->setWorkPhone($this->work_phone);
        $organizer->setCellPhone($this->cell_phone);
        $organizer->setDescription($this->description);
        $organizer->setTwitter($this->twitter);
        $organizer->setInstagram($this->instagram);
        $organizer->setFacebook($this->facebook);
        $organizer->setWhatsapp($this->whatsapp);
        $organizer->setWebsite($this->website);
        $organizer->setBankName($this->bank_name);
        $organizer->setBankAccount($this->bank_account);
        if($this->uploadProfilePicture()){
            $organizer->setProfilePicture($this->_profile_file);
        }

        return $organizer->save() ? true : false;
    }

    public function uploadProfilePicture()
    {
        $path = \Yii::getAlias('@organizer/web/images/avater');
        $fileName = $this->getOrganizer()->getId() . '-' . 'avatar' . '-' . Carbon::now()->timestamp . '.' . $this->profile_picture->getExtension();
        $this->_profile_file = $fileName;
        if ($this->profile_picture->saveAs($path . '/' . $fileName )) {
            return true;
        } else return false;

    }


}