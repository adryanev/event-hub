<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

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
class UserOrganizer extends \yii\db\ActiveRecord implements IdentityInterface
{

    public function behaviors()
    {
        return
            [
                TimestampBehavior::className(),
                'softDeleteBehavior' => [
                    'class' => SoftDeleteBehavior::className(),
                    'softDeleteAttributeValues' => [
                        'isDeleted' => true
                    ],
                ],
            ];
    }
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

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'isDeleted' => StatusKonten::STATUS_ACTIVE]);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'isDeleted' => StatusKonten::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'isDeleted' => StatusKonten::STATUS_ACTIVE,
        ]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }


    private static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
