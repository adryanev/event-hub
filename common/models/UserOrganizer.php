<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_organizer".
 *
 * @property int $id
 * @property string $email
 * @property string $password_hash
 * @property string $name
 * @property int $organization_type
 * @property string $address_1
 * @property string $address_2
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $postal_code
 * @property double $latitude
 * @property double $longitude
 * @property string $profile_picture
 * @property string $work_phone
 * @property string $cell_phone
 * @property string $description
 * @property string $twitter
 * @property string $instagram
 * @property string $facebook
 * @property string $whatsapp
 * @property string $website
 * @property int $bank_name
 * @property string $bank_account
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property HubWalletOrganizer[] $hubWalletOrganizers
 * @property MoneyRedeemTransaction[] $moneyRedeemTransactions
 * @property MoneyTicketTransaction[] $moneyTicketTransactions
 * @property OrganizerVerification[] $organizerVerifications
 * @property Bank $bankName
 * @property Organization $organizationType
 * @property UserSubscription[] $userSubscriptions
 */
class UserOrganizer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_organizer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'address_1', 'country', 'province', 'city', 'postal_code', 'profile_picture', 'cell_phone', 'description', 'created_at', 'updated_at'], 'required'],
            [['organization_type', 'bank_name', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['email', 'name', 'description', 'twitter', 'instagram', 'facebook', 'website', 'bank_account'], 'string', 'max' => 255],
            [['password_hash', 'profile_picture'], 'string', 'max' => 128],
            [['address_1', 'address_2'], 'string', 'max' => 64],
            [['country', 'province', 'city'], 'string', 'max' => 32],
            [['postal_code'], 'string', 'max' => 6],
            [['work_phone', 'cell_phone', 'whatsapp'], 'string', 'max' => 16],
            [['email'], 'unique'],
            [['bank_name'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_name' => 'id']],
            [['organization_type'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'name' => 'Name',
            'organization_type' => 'Organization Type',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'postal_code' => 'Postal Code',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'profile_picture' => 'Profile Picture',
            'work_phone' => 'Work Phone',
            'cell_phone' => 'Cell Phone',
            'description' => 'Description',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'whatsapp' => 'Whatsapp',
            'website' => 'Website',
            'bank_name' => 'Bank Name',
            'bank_account' => 'Bank Account',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHubWalletOrganizers()
    {
        return $this->hasMany(HubWalletOrganizer::className(), ['id_organizer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyRedeemTransactions()
    {
        return $this->hasMany(MoneyRedeemTransaction::className(), ['id_organizer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyTicketTransactions()
    {
        return $this->hasMany(MoneyTicketTransaction::className(), ['to_organizer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizerVerifications()
    {
        return $this->hasMany(OrganizerVerification::className(), ['id_organizer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankName()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationType()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSubscriptions()
    {
        return $this->hasMany(UserSubscription::className(), ['id_organizer' => 'id']);
    }
}
