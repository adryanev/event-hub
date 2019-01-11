<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "hub_wallet_organizer".
 *
 * @property int $id
 * @property int $id_organizer
 * @property double $balance
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property UserOrganizer $organizer
 */
class HubWalletOrganizer extends \yii\db\ActiveRecord
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
        return 'hub_wallet_organizer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organizer', 'balance', 'created_at', 'updated_at'], 'required'],
            [['id_organizer', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['balance'], 'number'],
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
            'balance' => 'Balance',
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
