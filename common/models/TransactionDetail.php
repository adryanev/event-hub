<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction_detail".
 *
 * @property int $id
 * @property int $id_transaction
 * @property int $id_ticket
 * @property int $isDeleted
 *
 * @property Ticketing $ticket
 * @property Transaction $transaction
 */
class TransactionDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaction', 'id_ticket', 'isDeleted'], 'integer'],
            [['id_ticket'], 'exist', 'skipOnError' => true, 'targetClass' => Ticketing::className(), 'targetAttribute' => ['id_ticket' => 'id']],
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
            'id_ticket' => 'Id Ticket',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticketing::className(), ['id' => 'id_ticket']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaction()
    {
        return $this->hasOne(Transaction::className(), ['id' => 'id_transaction']);
    }
}
