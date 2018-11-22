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

        $this->createTable('{{%user_participant}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'auth_token'=>$this->string(64)->notNull(),
            'prefix'=> $this->string(3),
            'first_name'=> $this->string(16)->notNull(),
            'middle_name'=>$this->string(16),
            'last_name'=> $this->string(16)->notNull(),
            'cell_phone'=>$this->string(16)->notNull(),
            'birth_date'=>$this->string(10),
            'company_organization'=>$this->string(64),
            'address_1'=>$this->string(64)->notNull(),
            'address_2'=>$this->string(64),
            'country'=>$this->string(32)->notNull(),
            'province'=>$this->string(32)->notNull(),
            'city'=>$this->string(32)->notNull(),
            'postal_code'=>$this->string(6)->notNull(),
            'profile_picture'=>$this->string(128)->notNull(),
            'gender'=>$this->string(1),
            'bank_name'=>$this->string(16)->notNull(),
            'bank_account'=>$this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%user_organizer}}',[
            'id'=> $this->primaryKey(),
            'email'=>$this->string()->notNull()->unique(),
            'password'=>$this->string(128),
            'name'=>$this->string()->notNull(),
            'is_organization'=>$this->boolean(),
            'address_1'=>$this->string(64)->notNull(),
            'address_2'=>$this->string(64),
            'country'=>$this->string(32)->notNull(),
            'province'=>$this->string(32)->notNull(),
            'city'=>$this->string(32)->notNull(),
            'postal_code'=>$this->string(6)->notNull(),
            'latitude'=>$this->float(),
            'longitude'=>$this->float(),
            'profile_picture'=>$this->string(128)->notNull(),
            'work_phone'=>$this->string(16),
            'cell_phone'=>$this->string(16)->notNull(),
            'description'=>$this->string(255)->notNull(),
            'twitter'=>$this->string(255),
            'instagram'=>$this->string(255),
            'facebook'=>$this->string(255),
            'whatsapp'=>$this->string(16),
            'website'=>$this->string(),
            'bank_name'=>$this->string(16)->notNull(),
            'bank_account'=>$this->string()->notNull(),
            'is_active'=>$this->boolean(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
        ],$tableOptions);

        $this->createTable('{{%organizer_verification}}',[
            'id'=>$this->primaryKey(),
            'id_organization'=>$this->integer()->notNull(),
            'verification_file'=>$this->string()->notNull(),
            'verification_status'=>$this->boolean()
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
            'event_type'=>$this->integer()->notNull(),
            'event_topic'=>$this->integer()->notNull(),
            'show_remaining'=>$this->boolean()->notNull(),
            'instagram_link'=>$this->string(),
            'facebook_link'=>$this->string(),
            'twitter_link'=>$this->string(),
            'event_status'=>$this->string(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),

        ],$tableOptions);

        $this->createTable('{{%ticketing}}',[
            'id'=>$this->primaryKey(),
            'id_event'=>$this->integer(),
            'ticket_name'=>$this->string(16),
            'quantity'=>$this->integer(),
            'price'=>$this->bigInteger(),
            'ticket_type'=>$this->integer(),

        ],$tableOptions);

        $this->createTable('{{%event_participant}}',[

        ],$tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
