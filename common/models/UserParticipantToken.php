<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "user_participant_token".
 *
 * @property int $id
 * @property int $user_id
 * @property string $data
 * @property string $decoded_data
 * @property string $provider
 * @property string $token
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserParticipant $user
 */
class UserParticipantToken extends \yii\db\ActiveRecord
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
        return 'user_participant_token';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'data', 'decoded_data', 'provider', 'token', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['data', 'decoded_data'], 'string'],
            [['provider'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 64],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserParticipant::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'data' => 'Data',
            'decoded_data' => 'Decoded Data',
            'provider' => 'Provider',
            'token' => 'Token',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'user_id']);
    }
}
