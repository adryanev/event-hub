<?php

use yii\db\Migration;

/**
 * Class m190125_083229_add_tabel_notification_for_user
 */
class m190125_083229_add_tabel_notification_for_user extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%notification_admin}}',[
            'id'=>$this->primaryKey(),
            'messages'=>$this->string(),
            'channel'=>$this->string(),
            'event'=>$this->string(),
            'id_admin'=>$this->integer(),
            'isOpened'=>$this->boolean()->defaultValue(0),
            'isDeleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),

        ],$tableOptions);
        $this->createTable('{{%notification_organizer}}',[
            'id'=>$this->primaryKey(),
            'messages'=>$this->string(),
            'channel'=>$this->string(),
            'event'=>$this->string(),
            'id_organizer'=>$this->integer(),
            'isOpened'=>$this->boolean()->defaultValue(0),
            'isDeleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%notification_participant}}',[
            'id'=>$this->primaryKey(),
            'messages'=>$this->string(),
            'channel'=>$this->string(),
            'event'=>$this->string(),
            'id_participant'=>$this->integer(),
            'isOpened'=>$this->boolean()->defaultValue(0),
            'isDeleted'=>$this->boolean()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ],$tableOptions);


        $this->addForeignKey('fk-notification_admin-administrator',
            '{{%notification_admin}}',
            'id_admin',
            '{{%administrator}}',
            'id');
        $this->addForeignKey('fk-notification_organizer-user_organizer',
            '{{%notification_organizer}}',
            'id_organizer',
            '{{%user_organizer}}',
            'id');
        $this->addForeignKey('fk-notification_participant-user_participant',
            '{{%notification_participant}}',
            'id_participant',
            '{{%user_participant}}',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-notification_organizer-user_organizer','{{%notification_organizer}}');
        $this->dropForeignKey('fk-notification_participant-user_participant','{{%notification_participant}}');

        $this->dropTable('{{%notification_admin}}');
        $this->dropTable('{{%notification_organizer}}');
        $this->dropTable('{{%notification_participant}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190125_083229_add_tabel_notification_for_user cannot be reverted.\n";

        return false;
    }
    */
}
