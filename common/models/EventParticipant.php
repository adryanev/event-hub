<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "event_participant".
 *
 * @property int $id
 * @property int $id_transaction
 * @property int $id_user
 * @property int $is_present
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserParticipant $user
 */
class EventParticipant extends \yii\db\ActiveRecord
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
        return 'event_participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_user', 'is_present', 'created_at', 'updated_at'], 'required'],
            [['id_transaction', 'id_user', 'is_present', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
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
            'id_transaction' => 'Id Transaction',
            'id_user' => 'Id User',
            'is_present' => 'Is Present',
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
