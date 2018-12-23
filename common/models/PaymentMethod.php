<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_payment_method".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property Transaction[] $transactions
 */
class PaymentMethod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_payment_method';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['payment_method' => 'id']);
    }
}
