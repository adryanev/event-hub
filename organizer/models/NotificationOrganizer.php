<?php

namespace organizer\models;

use Yii;

/**
 * This is the model class for table "notification_organizer".
 *
 * @property int $id
 * @property string $messages
 * @property string $channel
 * @property string $event
 * @property int $id_organizer
 * @property int $isOpened
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 * @property string $action
 *
 * @property UserOrganizer $organizer
 */
class NotificationOrganizer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_organizer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organizer', 'isOpened', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['messages', 'channel', 'event', 'action'], 'string', 'max' => 255],
            [['id_organizer'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrganizer::className(), 'targetAttribute' => ['id_organizer' => 'id']],
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
            'id_organizer' => 'Id Organizer',
            'isOpened' => 'Is Opened',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'action' => 'Action',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizer()
    {
        return $this->hasOne(UserOrganizer::className(), ['id' => 'id_organizer']);
    }
}
