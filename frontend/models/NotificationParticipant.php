<?php

namespace frontend\models;

use common\models\UserParticipant;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "notification_participant".
 *
 * @property int $id
 * @property string $messages
 * @property string $channel
 * @property string $event
 * @property int $id_participant
 * @property int $isOpened
 * @property int $isDeleted
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UserParticipant $participant
 */
class NotificationParticipant extends \yii\db\ActiveRecord
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
        return 'notification_participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['messages'], 'string'],
            [['id_participant', 'isOpened', 'isDeleted'], 'integer'],
            [['channel', 'event', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['id_participant'], 'exist', 'skipOnError' => true, 'targetClass' => UserParticipant::className(), 'targetAttribute' => ['id_participant' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'messages' => 'Messages',
            'channel' => 'Channel',
            'event' => 'Event',
            'id_participant' => 'Id Participant',
            'isOpened' => 'Is Opened',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'id_participant']);
    }
}
