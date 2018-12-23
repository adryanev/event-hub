<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "money_refund_transaction".
 *
 * @property int $id
 * @property int $id_transaction
 * @property double $amount
 * @property int $is_success
 * @property string $comment
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property Transaction $transaction
 */
class MoneyRefundTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'money_refund_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaction', 'is_success', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['amount', 'is_success', 'comment', 'created_at', 'updated_at'], 'required'],
            [['amount'], 'number'],
            [['comment'], 'string'],
            [['id_transaction'], 'exist', 'skipOnError' => true, 'targetClass' => Transaction::className(), 'targetAttribute' => ['id_transaction' => 'id']],
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
    public function getTransaction()
    {
        return $this->hasOne(Transaction::className(), ['id' => 'id_transaction']);
    }
}
