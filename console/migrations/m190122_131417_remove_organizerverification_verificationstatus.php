<?php

use yii\db\Migration;

/**
 * Class m190122_131417_remove_organizerverification_verificationstatus
 */
class m190122_131417_remove_organizerverification_verificationstatus extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->dropColumn('{{%organizer_verification}}','verification_status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190122_131417_remove_organizerverification_verificationstatus cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190122_131417_remove_organizerverification_verificationstatus cannot be reverted.\n";

        return false;
    }
    */
}
