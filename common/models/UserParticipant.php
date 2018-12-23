<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_participant".
 *
 * @property int $id
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EventParticipant[] $eventParticipants
 * @property Feedback[] $feedbacks
 * @property HubWalletUser[] $hubWalletUsers
 * @property MoneyTicketTransaction[] $moneyTicketTransactions
 * @property Transaction[] $transactions
 * @property Transaction[] $transactions0
 * @property UserParticipantProfile[] $userParticipantProfiles
 * @property UserParticipantToken[] $userParticipantTokens
 * @property UserSubscription[] $userSubscriptions
 */
class UserParticipant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
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
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventParticipants()
    {
        return $this->hasMany(EventParticipant::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHubWalletUsers()
    {
        return $this->hasMany(HubWalletUser::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyTicketTransactions()
    {
        return $this->hasMany(MoneyTicketTransaction::className(), ['from_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions0()
    {
        return $this->hasMany(Transaction::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserParticipantProfiles()
    {
        return $this->hasMany(UserParticipantProfile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserParticipantTokens()
    {
        return $this->hasMany(UserParticipantToken::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSubscriptions()
    {
        return $this->hasMany(UserSubscription::className(), ['id_user' => 'id']);
    }
}
