<?php

use yii\db\Migration;

/**
 * Class m190114_123020_update_accesstoken_participant
 */
class m190114_123020_update_accesstoken_participant extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_participant}}','access_token',$this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_organizer}}','access_token');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_123020_update_accesstoken_participant cannot be reverted.\n";

        return false;
    }
    */
}
