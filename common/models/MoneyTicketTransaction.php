<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "money_ticket_transaction".
 *
 * @property int $id
 * @property int $from_user
 * @property int $to_organizer
 * @property double $amount
 * @property string $via
 * @property int $is_success
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserOrganizer $toOrganizer
 * @property UserParticipant $fromUser
 */
class MoneyTicketTransaction extends \yii\db\ActiveRecord
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
        return 'money_ticket_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_user', 'to_organizer', 'amount', 'via', 'is_success', 'created_at', 'updated_at'], 'required'],
            [['from_user', 'to_organizer', 'is_success', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['amount'], 'number'],
            [['via'], 'string', 'max' => 255],
            [['to_organizer'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrganizer::className(), 'targetAttribute' => ['to_organizer' => 'id']],
            [['from_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserParticipant::className(), 'targetAttribute' => ['from_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_user' => 'From User',
            'to_organizer' => 'To Organizer',
            'amount' => 'Amount',
            'via' => 'Via',
            'is_success' => 'Is Success',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToOrganizer()
    {
        return $this->hasOne(UserOrganizer::className(), ['id' => 'to_organizer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromUser()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'from_user']);
    }
}
