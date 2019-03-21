<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "notification_admin".
 *
 * @property int $id
 * @property string $messages
 * @property string $channel
 * @property string $event
 * @property int $isOpened
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 * @property string $from
 * @property string $action
 */
class NotificationAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['isOpened', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['messages', 'channel', 'event', 'from', 'action'], 'string', 'max' => 255],
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
            'isOpened' => 'Is Opened',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'from' => 'From',
            'action' => 'Action',
        ];
    }
}
