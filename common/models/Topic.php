<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "master_topic".
 *
 * @property int $id
 * @property string $topic_name
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 *
 * @property Event[] $events
 */
class Topic extends \yii\db\ActiveRecord
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
        return 'master_topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic_name'], 'required'],
            [['created_at', 'updated_at', 'isDeleted'], 'integer'],
            [['topic_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic_name' => 'Topic Name',
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
        return $this->hasMany(Event::className(), ['topic' => 'id']);
    }

    public static function findByName($topic_name)
    {
        return self::find()->where(['topic_name' => $topic_name]);
    }
}
