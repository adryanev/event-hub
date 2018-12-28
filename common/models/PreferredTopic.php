<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prefered_topic".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_topic
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 */
class PreferredTopic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prefered_topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_topic', 'created_at', 'updated_at'], 'required'],
            [['id_user', 'id_topic', 'created_at', 'updated_at', 'isDeleted'], 'integer'],
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
            'id_topic' => 'Id Topic',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }
}
