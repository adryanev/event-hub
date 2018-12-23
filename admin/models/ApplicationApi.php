<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "application_api".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $token
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 */
class ApplicationApi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application_api';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'token', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 32],
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
            'description' => 'Description',
            'token' => 'Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }
}
