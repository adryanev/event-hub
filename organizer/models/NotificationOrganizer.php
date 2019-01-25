<?php

namespace organizer\models;

use common\models\UserOrganizer;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

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
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UserOrganizer $organizer
 */
class NotificationOrganizer extends \yii\db\ActiveRecord
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
        return 'notification_organizer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['messages'], 'string'],
            [['id_organizer', 'isOpened', 'isDeleted'], 'integer'],
            [['channel', 'event', 'created_at', 'updated_at'], 'string', 'max' => 255],
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
