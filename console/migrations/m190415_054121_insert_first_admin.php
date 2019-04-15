<?php

use yii\db\Migration;

/**
 * Class m190415_054121_insert_first_admin
 */
class m190415_054121_insert_first_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190415_054121_insert_first_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_054121_insert_first_admin cannot be reverted.\n";

        return false;
    }
    */
}
