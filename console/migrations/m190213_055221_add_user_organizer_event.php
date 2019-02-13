<?php

use yii\db\Migration;

/**
 * Class m190213_055221_add_user_organizer_event
 */
class m190213_055221_add_user_organizer_event extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%event}}','user_organizer',$this->integer());

        $this->addForeignKey(
            'fk-event-user_organizer',
            '{{%event}}',
            'user_organizer',
            '{{%user_organizer}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-event-user_organizer','{{%event}}');
        $this->dropColumn('{{%event}}','user_organizer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190213_055221_add_user_organizer_event cannot be reverted.\n";

        return false;
    }
    */
}
