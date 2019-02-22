<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "master_organization".
 *
 * @property int $id
 * @property string $name
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserOrganizer[] $userOrganizers
 */
class Organization extends \yii\db\ActiveRecord
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
        return 'master_organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['isDeleted', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Organization Name',
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
        return $this->hasMany(UserOrganizer::className(), ['organization_type' => 'id']);
    }

    public static function getOrganizationAsKeyValue(){
        $organization = self::find()->all();
        $data = ArrayHelper::map($organization,'id','name');
        return $data;
    }
}
