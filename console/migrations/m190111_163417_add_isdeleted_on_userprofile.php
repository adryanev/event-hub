<?php

use yii\db\Migration;

/**
 * Class m190111_163417_add_isdeleted_on_userprofile
 */
class m190111_163417_add_isdeleted_on_userprofile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%user_participant_profile}}','isDeleted',$this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user_participant_profile}}','isDeleted');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190111_163417_add_isdeleted_on_userprofile cannot be reverted.\n";

        return false;
    }
    */
}
