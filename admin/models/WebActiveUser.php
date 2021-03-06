<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "web_active_user".
 *
 * @property int $id
 * @property string $device_token
 * @property int $timestamp
 */
class WebActiveUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_active_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['device_token', 'timestamp'], 'required'],
            [['timestamp'], 'integer'],
            [['device_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'device_token' => 'Device Token',
            'timestamp' => 'Timestamp',
        ];
    }
}
