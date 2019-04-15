<?php

use yii\db\Migration;

/**
 * Class m190415_054032_add_table_relationship
 */
class m190415_054032_add_table_relationship extends Migration
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
        echo "m190415_054032_add_table_relationship cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190415_054032_add_table_relationship cannot be reverted.\n";

        return false;
    }
    */
}
