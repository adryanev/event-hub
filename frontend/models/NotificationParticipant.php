<?php

namespace frontend\models;

use Yii;

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
 * @property int $created_at
 * @property int $updated_at
 * @property string $from
 * @property string $action
 *
 * @property UserParticipant $participant
 */
class NotificationParticipant extends \yii\db\ActiveRecord
{
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
            [['id_participant', 'isOpened', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['messages', 'channel', 'event', 'from', 'action'], 'string', 'max' => 255],
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
            'from' => 'From',
            'action' => 'Action',
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
