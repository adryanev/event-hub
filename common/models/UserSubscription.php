<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_subscription".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_organizer
 * @property int $notification
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserOrganizer $organizer
 * @property UserParticipant $user
 */
class UserSubscription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_subscription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_organizer', 'notification', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['id_organizer', 'notification', 'created_at', 'updated_at'], 'required'],
            [['id_organizer'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrganizer::className(), 'targetAttribute' => ['id_organizer' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserParticipant::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_organizer' => 'Id Organizer',
            'notification' => 'Notification',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizer()
    {
        return $this->hasOne(UserOrganizer::className(), ['id' => 'id_organizer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'id_user']);
    }
}
