<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property int $is_offline
 * @property string $venue_name
 * @property string $address_1
 * @property string $address_2
 * @property string $country
 * @property string $province
 * @property string $city
 * @property double $latitude
 * @property double $longitude
 * @property string $start_date
 * @property string $end_date
 * @property string $start_time
 * @property string $end_time
 * @property string $event_poster
 * @property string $description
 * @property string $publishing_type
 * @property int $type
 * @property int $topic
 * @property int $show_remaining
 * @property string $instagram_link
 * @property string $facebook_link
 * @property string $twitter_link
 * @property int $event_status
 * @property int $isDeleted
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_organizer
 *
 * @property EventStatus $eventStatus
 * @property Topic $topic0
 * @property Type $type0
 * @property UserOrganizer $userOrganizer
 * @property Ticketing[] $ticketings
 */
class Event extends \yii\db\ActiveRecord
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
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'venue_name', 'address_1', 'country', 'province', 'city', 'start_date', 'end_date', 'start_time', 'end_time', 'event_poster', 'description', 'publishing_type', 'type', 'topic', 'show_remaining', 'created_at', 'updated_at'], 'required'],
            [['is_offline', 'type', 'topic', 'show_remaining', 'event_status', 'isDeleted', 'created_at', 'updated_at', 'user_organizer'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['title', 'venue_name', 'event_poster', 'description', 'instagram_link', 'facebook_link', 'twitter_link'], 'string', 'max' => 255],
            [['address_1', 'address_2'], 'string', 'max' => 64],
            [['country', 'province', 'city'], 'string', 'max' => 32],
            [['start_date', 'end_date'], 'string', 'max' => 10],
            [['start_time', 'end_time', 'publishing_type'], 'string', 'max' => 8],
            [['event_status'], 'exist', 'skipOnError' => true, 'targetClass' => EventStatus::className(), 'targetAttribute' => ['event_status' => 'id']],
            [['topic'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::className(), 'targetAttribute' => ['topic' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type' => 'id']],
            [['user_organizer'], 'exist', 'skipOnError' => true, 'targetClass' => UserOrganizer::className(), 'targetAttribute' => ['user_organizer' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'is_offline' => 'Is Offline',
            'venue_name' => 'Venue Name',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'event_poster' => 'Event Poster',
            'description' => 'Description',
            'publishing_type' => 'Publishing Type',
            'type' => 'Type',
            'topic' => 'Topic',
            'show_remaining' => 'Show Remaining',
            'instagram_link' => 'Instagram Link',
            'facebook_link' => 'Facebook Link',
            'twitter_link' => 'Twitter Link',
            'event_status' => 'Event Status',
            'isDeleted' => 'Is Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_organizer' => 'User Organizer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventStatus()
    {
        return $this->hasOne(EventStatus::className(), ['id' => 'event_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopic0()
    {
        return $this->hasOne(Topic::className(), ['id' => 'topic']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(Type::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserOrganizer()
    {
        return $this->hasOne(UserOrganizer::className(), ['id' => 'user_organizer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketings()
    {
        return $this->hasMany(Ticketing::className(), ['id_event' => 'id']);
    }
}
