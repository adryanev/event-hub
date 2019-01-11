<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "master_type".
 *
 * @property int $id
 * @property string $type_name
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property Event[] $events
 */
class EventType extends \yii\db\ActiveRecord
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
        return 'master_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_name' => 'Type Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['type' => 'id']);
    }
}
