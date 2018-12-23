<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_participant_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $prefix
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $cell_phone
 * @property string $birth_date
 * @property string $address_1
 * @property string $address_2
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $postal_code
 * @property string $profile_picture
 * @property string $gender
 * @property int $bank_name
 * @property string $bank_account
 * @property int $created_at
 * @property int $updated_at
 *
 * @property UserParticipant $user
 * @property Bank $bankName
 */
class UserParticipantProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_participant_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'bank_name', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'cell_phone', 'address_1', 'country', 'province', 'city', 'postal_code', 'profile_picture', 'created_at', 'updated_at'], 'required'],
            [['prefix'], 'string', 'max' => 3],
            [['first_name', 'middle_name', 'last_name', 'cell_phone'], 'string', 'max' => 16],
            [['birth_date'], 'string', 'max' => 10],
            [['address_1', 'address_2'], 'string', 'max' => 64],
            [['country', 'province', 'city'], 'string', 'max' => 32],
            [['postal_code'], 'string', 'max' => 6],
            [['profile_picture'], 'string', 'max' => 128],
            [['gender'], 'string', 'max' => 1],
            [['bank_account'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserParticipant::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['bank_name'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_name' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'prefix' => 'Prefix',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'cell_phone' => 'Cell Phone',
            'birth_date' => 'Birth Date',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'postal_code' => 'Postal Code',
            'profile_picture' => 'Profile Picture',
            'gender' => 'Gender',
            'bank_name' => 'Bank Name',
            'bank_account' => 'Bank Account',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserParticipant::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBankName()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_name']);
    }
}
