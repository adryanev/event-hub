<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hub_wallet_user".
 *
 * @property int $id
 * @property int $id_user
 * @property double $balance
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserParticipant $user
 */
class HubWalletUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hub_wallet_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'balance', 'created_at', 'updated_at'], 'required'],
            [['id_user', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['balance'], 'number'],
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
            'balance' => 'Balance',
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
