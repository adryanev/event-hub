<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "ticketing".
 *
 * @property int $id
 * @property int $id_event
 * @property string $ticket_name
 * @property int $quantity
 * @property string $price
 * @property int $ticket_type
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Event $event
 * @property TransactionDetail[] $transactionDetails
 */
class Ticketing extends \yii\db\ActiveRecord
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
        return 'ticketing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_event', 'quantity', 'price', 'ticket_type', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['ticket_name'], 'string', 'max' => 16],
            [['id_event'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['id_event' => 'id']],
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
            'ticket_name' => 'Ticket Name',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'ticket_type' => 'Ticket Type',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'id_event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionDetails()
    {
        return $this->hasMany(TransactionDetail::className(), ['id_ticket' => 'id']);
    }
}
