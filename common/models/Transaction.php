<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int $id_user
 * @property string $payment_number
 * @property int $payment_method
 * @property string $status
 * @property string $expiration
 * @property double $total_price
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MoneyRefundTransaction[] $moneyRefundTransactions
 * @property UserParticipant $user
 * @property PaymentMethod $paymentMethod
 * @property UserParticipant $user0
 * @property TransactionDetail[] $transactionDetails
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'payment_number', 'payment_method', 'status', 'expiration', 'total_price', 'created_at', 'updated_at'], 'required'],
            [['id_user', 'payment_method', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['total_price'], 'number'],
            [['payment_number', 'status', 'expiration'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => UserParticipant::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['payment_method'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentMethod::className(), 'targetAttribute' => ['payment_method' => 'id']],
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
            'payment_number' => 'Payment Number',
            'payment_method' => 'Payment Method',
            'status' => 'Status',
            'expiration' => 'Expiration',
            'total_price' => 'Total Price',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMoneyRefundTransactions()
    {
        return $this->hasMany(MoneyRefundTransaction::className(), ['id_transaction' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'payment_method']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionDetails()
    {
        return $this->hasMany(TransactionDetail::className(), ['id_transaction' => 'id']);
    }
}
