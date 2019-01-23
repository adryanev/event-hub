<?php

use yii\db\Migration;

/**
 * Class m190123_143413_add_verificationstatus_organizer
 */
class m190123_143413_add_verificationstatus_organizer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%user_organizer}}','verification_status',"ENUM('not_verified', 'pending', 'verified')");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_organizer}}','verification_status');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190123_143413_add_verificationstatus_organizer cannot be reverted.\n";

        return false;
    }
    */
}
