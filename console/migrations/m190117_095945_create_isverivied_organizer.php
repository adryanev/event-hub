<?php

use yii\db\Migration;

/**
 * Class m190117_095945_create_isverivied_organizer
 */
class m190117_095945_create_isverivied_organizer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user_organizer}}','isVerified',$this->boolean());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('{{%user_organizer}}','isVerfied');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190117_095945_create_isverivied_organizer cannot be reverted.\n";

        return false;
    }
    */
}
