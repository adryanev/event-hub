<?php

use yii\db\Migration;

/**
 * Class m190114_122727_update_auth_access_organizer
 */
class m190114_122727_update_auth_access_organizer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_organizer}}','auth_key',$this->string(32));
        $this->addColumn('{{%user_organizer}}','access_token',$this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_organizer}}','auth_key');
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
        echo "m190114_122727_update_auth_access_organizer cannot be reverted.\n";

        return false;
    }
    */
}
