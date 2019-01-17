<?php
/**
 * Project: event-hub.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 1/14/2019
 * Time: 7:09 PM
 */

namespace organizer\models;


use common\models\StatusKonten;
use common\models\UserOrganizer;
use yii\base\Model;

class OrganizerSignupForm extends Model
{
    public $email;
    public $password;
    public $name;
//    public $organization;
    public $reCaptcha;

    private $_organizer;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'min' => 1, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => UserOrganizer::class, 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['reCaptcha', \himiklab\yii2\recaptcha\ReCaptchaValidator::class, 'uncheckedMessage' => 'Please confirm that you are not a bot.'],
//            ['organization', 'required'],
//            ['organization', 'integer'],

        ];
    }


    public function signup(){
        if (!$this->validate()) return null;

        \Yii::debug('Validasi model berhasil',__METHOD__);
        $organizer = new UserOrganizer(['scenario'=>UserOrganizer::SCENARIO_SIGNUP]);
        $organizer->name = $this->name;
        $organizer->email = $this->email;
        $organizer->isDeleted = StatusKonten::STATUS_DELETED;
        $organizer->isVerified = StatusKonten::STATUS_NOT_VERIFIED;
        $organizer->profile_picture = 'organizer.png';
        $organizer->generateAuthKey();
        $organizer->setPassword($this->password);
        \Yii::debug($organizer,__METHOD__);
        return $organizer->save() ? $organizer : null;

    }

    public function attributeLabels()

    {

        return [

            'reCaptcha' => '',

        ];

    }


}