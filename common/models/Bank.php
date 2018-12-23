<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_bank".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserOrganizer[] $userOrganizers
 * @property UserParticipantProfile[] $userParticipantProfiles
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'created_at', 'updated_at'], 'required'],
            [['isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['name', 'code'], 'string', 'max' => 255],
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
            'code' => 'Code',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrganizers()
    {
        return $this->hasMany(UserOrganizer::className(), ['bank_name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserParticipantProfiles()
    {
        return $this->hasMany(UserParticipantProfile::className(), ['bank_name' => 'id']);
    }
}
