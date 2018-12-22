<?php

use yii\db\Migration;

/**
 * Class m181222_195033_add_first_admin
 */
class m181222_195033_add_first_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert('{{%administrator}}',[
            'id' =>1,
            'email' => 'adryanekavandra@gmail.com',
            'username'=>'adryanev',
            'auth_key' => 'Pwys0TRico7Ha4YSyX2fmjABrFskscxh',
            'prefix'=> 'Mr',
            'first_name'=> 'Adryan',
            'middle_name'=>'Eka',
            'last_name'=> 'Vandra',
            'cell_phone'=>'+6282174969356',
            'birth_date'=>'1996-09-08',
            'profile_picture'=>'adryanev.jpg',
            'gender'=>'L',
            'password_hash' => '$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',
            'password_reset_token' => null,
            'isDeleted' => 0,
            'created_at' => 1545508620,
            'updated_at' => 1545508620,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        print("Deleting 1st admin");
        $this->delete('{{%administrator}}',['id'=>1]);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181222_195033_add_first_admin cannot be reverted.\n";

        return false;
    }
    */
}
