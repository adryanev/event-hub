<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;
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
class Topic extends \yii\db\ActiveRecord implements Linkable
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

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/users/1',
     *     'friends' => [
     *         'http://example.com/users/2',
     *         'http://example.com/users/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks()
    {
        return[
          Link::REL_SELF => Url::to(['topic/view','id'=>$this->id])
        ];
    }

    public static function getTopicAsKeyValue(){
        $data = self::find()->all();
        $json = ArrayHelper::map($data,'id','topic_name');
        return $json;
    }
}
