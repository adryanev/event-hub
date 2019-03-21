<?php

use yii\db\Migration;

/**
 * Class m190321_065140_edit_notification_table
 */
class m190321_065140_edit_notification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%notification_admin}}','action',$this->string());
        $this->addColumn('{{%notification_organizer}}','action',$this->string());
        $this->addColumn('{{%notification_participant}}','action',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropColumn('{{%notification_admin}}','action');
        $this->dropColumn('{{%notification_organizer}}','action');
        $this->dropColumn('{{%notification_participant}}','action');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190321_065140_edit_notification_table cannot be reverted.\n";

        return false;
    }
    */
}
