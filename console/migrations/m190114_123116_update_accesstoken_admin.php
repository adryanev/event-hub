<?php

use yii\db\Migration;

/**
 * Class m190114_123116_update_accesstoken_admin
 */
class m190114_123116_update_accesstoken_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%administrator}}','access_token',$this->string());

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
        echo "m190114_123116_update_accesstoken_admin cannot be reverted.\n";

        return false;
    }
    */
}
