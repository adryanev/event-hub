<?php

namespace admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "notification_admin".
 *
 * @property int $id
 * @property string $messages
 * @property string $channel
 * @property string $event
 * @property int $isOpened
 * @property int $isDeleted
 * @property string $created_at
 * @property string $updated_at
 */
class NotificationAdmin extends \yii\db\ActiveRecord
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
        return 'notification_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['messages'], 'string'],
            [['isOpened', 'isDeleted'], 'integer'],
            [['channel', 'event', 'created_at', 'updated_at'], 'string', 'max' => 255],
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
        ];
    }
}
