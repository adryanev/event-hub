<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%administrator}}',[
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'username'=>$this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'prefix'=> $this->string(3),
            'first_name'=> $this->string(16)->notNull(),
            'middle_name'=>$this->string(16),
            'last_name'=> $this->string(16)->notNull(),
            'cell_phone'=>$this->string(16)->notNull(),
            'birth_date'=>$this->string(10),
            'profile_picture'=>$this->string(128)->notNull(),
            'gender'=>$this->string(1),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ],$tableOptions);
        $this->createTable('{{%user_participant}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
        $this->createTable('{{%user_participant_token}}',[
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'data'=>$this->text()->notNull(),
            'decoded_data'=>$this->text()->notNull(),
            'provider'=>$this->string()->notNull(),
            'token'=>$this->string(64)->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at' => $this->integer(),
        ],$tableOptions);
        $this->createTable('{{%user_participant_profile}}',[
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer(),
            'prefix'=> $this->string(3),
            'first_name'=> $this->string(16)->notNull(),
            'middle_name'=>$this->string(16),
            'last_name'=> $this->string(16)->notNull(),
            'cell_phone'=>$this->string(16)->notNull(),
            'birth_date'=>$this->string(10),
            'address_1'=>$this->string(64)->notNull(),
            'address_2'=>$this->string(64),
            'country'=>$this->string(32)->notNull(),
            'province'=>$this->string(32)->notNull(),
            'city'=>$this->string(32)->notNull(),
            'postal_code'=>$this->string(6)->notNull(),
            'profile_picture'=>$this->string(128)->notNull(),
            'gender'=>$this->string(1),
            'bank_name'=>$this->integer(),
            'bank_account'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at' => $this->integer(),
        ],$tableOptions);

        $this->createTable('{{%master_bank}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'code'=>$this->string()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at' => $this->integer(),
        ],$tableOptions);
        $this->createTable('{{%master_organization}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at' => $this->integer(),
        ],$tableOptions);
        $this->createTable('{{%user_organizer}}',[
            'id'=> $this->primaryKey(),
            'email'=>$this->string()->notNull()->unique(),
            'password_hash'=>$this->string(128),
            'name'=>$this->string()->notNull(),
            'organization_type'=>$this->integer(),
            'address_1'=>$this->string(64),
            'address_2'=>$this->string(64),
            'country'=>$this->string(32),
            'province'=>$this->string(32),
            'city'=>$this->string(32),
            'postal_code'=>$this->string(6),
            'latitude'=>$this->float(),
            'longitude'=>$this->float(),
            'profile_picture'=>$this->string(128),
            'work_phone'=>$this->string(16),
            'cell_phone'=>$this->string(16),
            'description'=>$this->string(255),
            'twitter'=>$this->string(255),
            'instagram'=>$this->string(255),
            'facebook'=>$this->string(255),
            'whatsapp'=>$this->string(16),
            'website'=>$this->string(),
            'bank_name'=>$this->integer(),
            'bank_account'=>$this->string(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%organizer_verification}}',[
            'id'=>$this->primaryKey(),
            'id_organizer'=>$this->integer()->notNull(),
            'verification_file'=>$this->string()->notNull(),
            'verification_status'=>$this->boolean(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%event}}',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'is_offline'=>$this->boolean(),
            'venue_name'=>$this->string()->notNull(),
            'address_1'=>$this->string(64)->notNull(),
            'address_2'=>$this->string(64),
            'country'=>$this->string(32)->notNull(),
            'province'=>$this->string(32)->notNull(),
            'city'=>$this->string(32)->notNull(),
            'latitude'=>$this->float(),
            'longitude'=>$this->float(),
            'start_date'=>$this->string(10)->notNull(),
            'end_date'=>$this->string(10)->notNull(),
            'start_time'=>$this->string(8)->notNull(),
            'end_time'=>$this->string(8)->notNull(),
            'event_poster'=>$this->string()->notNull(),
            'description'=>$this->string()->notNull(),
            'publishing_type'=>$this->string(8)->notNull(),
            'type'=>$this->integer()->notNull(),
            'topic'=>$this->integer()->notNull(),
            'show_remaining'=>$this->boolean()->notNull(),
            'instagram_link'=>$this->string(),
            'facebook_link'=>$this->string(),
            'twitter_link'=>$this->string(),
            'event_status'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%master_event_status}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%ticketing}}',[
            'id'=>$this->primaryKey(),
            'id_event'=>$this->integer(),
            'ticket_name'=>$this->string(16),
            'quantity'=>$this->integer(),
            'price'=>$this->bigInteger(),
            'ticket_type'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%transaction}}',[
            'id'=>$this->primaryKey(),
            'id_user'=>$this->integer()->notNull(),
            'payment_number'=>$this->string()->notNull(),
            'payment_method'=>$this->integer()->notNull(),
            'status'=>$this->string()->notNull(),
            'expiration'=>$this->string()->notNull(),
            'total_price'=>$this->float()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%transaction_detail}}',[
            'id'=>$this->primaryKey(),
            'id_transaction'=>$this->integer(),
            'id_ticket'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%master_payment_method}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%user_subscription}}',[
            'id'=>$this->primaryKey(),
            'id_user'=>$this->integer(),
            'id_organizer'=>$this->integer()->notNull(),
            'notification'=>$this->boolean()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%hub_wallet_user}}',[
            'id'=>$this->primaryKey(),
            'id_user'=>$this->integer()->notNull(),
            'balance'=>$this->double()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%hub_wallet_organizer}}',[
            'id'=>$this->primaryKey(),
            'id_organizer'=>$this->integer()->notNull(),
            'balance'=>$this->double()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%event_participant}}',[
            'id'=>$this->primaryKey(),
            'id_transaction'=>$this->integer()->notNull(),
            'id_user'=>$this->integer()->notNull(),
            'is_present'=> $this->boolean()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%feedback}}',[
            'id'=>$this->primaryKey(),
            'id_event'=>$this->integer()->notNull(),
            'id_user'=>$this->integer()->notNull(),
            'rating_point'=>$this->float(),
            'message'=>$this->text(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%prefered_topic}}',[
            'id'=>$this->primaryKey(),
            'id_user'=>$this->integer()->notNull(),
            'id_topic'=>$this->integer()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%android_active_user}}',[
            'id'=>$this->primaryKey(),
            'device_token'=>$this->string()->notNull(),
            'timestamp'=>$this->integer()->notNull(),

        ],$tableOptions);
        $this->createTable('{{%web_active_user}}',[
            'id'=>$this->primaryKey(),
            'device_token'=>$this->string()->notNull(),
            'timestamp'=>$this->integer()->notNull(),
        ],$tableOptions);
        $this->createTable('{{%money_refund_transaction}}',[
            'id'=>$this->primaryKey(),
            'id_transaction'=>$this->integer(),
            'amount'=>$this->double()->notNull(),
            'is_success'=>$this->boolean()->notNull(),
            'comment'=>$this->text()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%money_ticket_transaction}}',[
            'id'=>$this->primaryKey(),
            'from_user'=>$this->integer()->notNull(),
            'to_organizer'=>$this->integer()->notNull(),
            'amount'=>$this->double()->notNull(),
            'via'=>$this->string()->notNull(),
            'is_success'=>$this->boolean()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%money_redeem_transaction}}',[
            'id'=>$this->primaryKey(),
            'id_organizer'=>$this->integer()->notNull(),
            'amount'=>$this->double()->notNull(),
            'is_success'=>$this->boolean()->notNull(),
            'comment'=>$this->text()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%master_topic}}',[
            'id'=>$this->primaryKey(),
            'topic_name'=>$this->string()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%master_type}}',[
            'id'=>$this->primaryKey(),
            'type_name'=>$this->string()->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);
        $this->createTable('{{%application_api}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'description'=>$this->string()->notNull(),
            'token'=>$this->string(32)->notNull(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
        ],$tableOptions);

        //indexing
        $this->createIndex('idx-event','{{%event}}',[
            'title',
            'is_offline',
            'city',
            'start_date',
            'type',
            'topic',
            'event_status'
        ]);
        $this->createIndex('idx-user_participant_profile','{{%user_participant_profile}}',[
            'cell_phone',
            'city',
            'profile_picture'
        ]);

        //foreign key
        $this->addForeignKey('fk-participant-token',
            '{{%user_participant_token}}',
            'user_id',
            '{{%user_participant}}',
            'id',
            'CASCADE',
            'CASCADE');
        $this->addForeignKey('fk-participant-profile',
            '{{%user_participant_profile}}',
            'user_id',
            '{{%user_participant}}',
            'id',
            'CASCADE',
            'CASCADE');
        $this->addForeignKey('fk-profile-bank',
            '{{%user_participant_profile}}',
            'bank_name',
            '{{%master_bank}}',
            'id',
            null,
            'CASCADE');
        $this->addForeignKey('fk-organizer-bank',
            '{{%user_organizer}}',
            'bank_name',
            '{{%master_bank}}',
            'id',
            null,
            'CASCADE');
        $this->addForeignKey('fk-organizer-organization',
            '{{%user_organizer}}',
            'organization_type',
            '{{%master_organization}}',
            'id',
            null,
            'CASCADE'
            );
        $this->addForeignKey('fk-verification-organizer',
            '{{%organizer_verification}}',
            'id_organizer',
            '{{%user_organizer}}',
            'id',
            'CASCADE',
            'CASCADE');
        $this->addForeignKey('fk-ticketing-event',
            '{{%ticketing}}',
            'id_event',
            '{{%event}}',
            'id',
            'CASCADE',
            'CASCADE');
        $this->addForeignKey('fk-transaction-participant',
            '{{%transaction}}',
            'id_user',
            '{{%user_participant}}',
            'id',
            'CASCADE',
            'CASCADE'
            );
        $this->addForeignKey('fk-event-topic',
            '{{%event}}',
            'topic',
            '{{%master_topic}}',
            'id');
        $this->addForeignKey('fk-event-type',
            '{{%event}}',
            'type',
            '{{%master_type}}',
            'id');
        $this->addForeignKey('fk-event-event_status',
            '{{%event}}',
            'event_status',
            '{{%master_event_status}}',
            'id');
        $this->addForeignKey('fk-transaction_detail-transaction',
            '{{%transaction_detail}}',
            'id_transaction',
            '{{%transaction}}',
            'id');
        $this->addForeignKey('fk-transaction_detail-ticketing',
            '{{%transaction_detail}}',
            'id_ticket',
            '{{%ticketing}}',
            'id');
        $this->addForeignKey('fk-transaction_user',
            '{{%transaction}}',
            'id_user',
            '{{%user_participant}}',
            'id');
        $this->addForeignKey('fk-transaction-payment_method',
            '{{%transaction}}',
            'payment_method',
            '{{%master_payment_method}}',
            'id');
        $this->addForeignKey('fk-user_subscription-user',
            '{{%user_subscription}}',
            'id_user',
            '{{%user_participant}}',
            'id');
        $this->addForeignKey('fk-user_subscription-organizer',
            '{{%user_subscription}}',
            'id_organizer',
            '{{%user_organizer}}',
            'id');
        $this->addForeignKey('fk-wallet-participant',
            '{{%hub_wallet_user}}',
            'id_user',
            '{{%user_participant}}',
            'id');
        $this->addForeignKey('fk-wallet-organizer',
            '{{%hub_wallet_organizer}}',
            'id_organizer',
            '{{%user_organizer}}',
            'id');
        $this->addForeignKey('fk-event_participant-user_participant',
            '{{%event_participant}}',
            'id_user',
            '{{%user_participant}}',
            'id');
        $this->addForeignKey('fk-feedback-user_participant',
            '{{%feedback}}',
            'id_user',
            '{{%user_participant}}',
            'id');
        $this->addForeignKey('fk-refund-transaction',
        '{{%money_refund_transaction}}',
            'id_transaction',
            '{{%transaction}}',
            'id');
        $this->addForeignKey('fk-money_ticket-participant',
            '{{%money_ticket_transaction}}',
            'from_user',
            '{{%user_participant}}',
            'id');
        $this->addForeignKey('fk-money_ticket-organizer',
            '{{%money_ticket_transaction}}',
            'to_organizer',
            '{{%user_organizer}}',
            'id');
        $this->addForeignKey('fk-money_redeem-organizer',
            '{{%money_redeem_transaction}}',
            'id_organizer',
            '{{%user_organizer}}',
            'id');










    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
