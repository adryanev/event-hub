<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "money_redeem_transaction".
 *
 * @property int $id
 * @property int $id_organizer
 * @property double $amount
 * @property int $is_success
 * @property string $comment
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserOrganizer $organizer
 */
class MoneyRedeemTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'money_redeem_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organizer', 'amount', 'is_success', 'comment', 'created_at', 'updated_at'], 'required'],
            [['id_organizer', 'is_success', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['amount'], 'number'],
            [['comment'], 'string'],
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
            'id_organizer' => 'Id Organizer',
            'amount' => 'Amount',
            'is_success' => 'Is Success',
            'comment' => 'Comment',
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
}
