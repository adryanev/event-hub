<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organizer_verification".
 *
 * @property int $id
 * @property int $id_organizer
 * @property string $verification_file
 * @property int $verification_status
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserOrganizer $organizer
 */
class OrganizerVerification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizer_verification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_organizer', 'verification_file', 'created_at', 'updated_at'], 'required'],
            [['id_organizer', 'verification_status', 'isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['verification_file'], 'string', 'max' => 255],
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
            'verification_file' => 'Verification File',
            'verification_status' => 'Verification Status',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
