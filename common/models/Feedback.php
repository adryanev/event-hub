<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $id_event
 * @property int $id_user
 * @property double $rating_point
 * @property string $message
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserParticipant $user
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_event', 'id_user', 'created_at', 'updated_at'], 'required'],
            [['id_event', 'id_user', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['rating_point'], 'number'],
            [['message'], 'string'],
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
            'id_event' => 'Id Event',
            'id_user' => 'Id User',
            'rating_point' => 'Rating Point',
            'message' => 'Message',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'id_user']);
    }
}
