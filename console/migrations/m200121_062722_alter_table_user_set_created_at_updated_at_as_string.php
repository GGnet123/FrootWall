<?php

use yii\db\Migration;

/**
 * Class m200121_062722_alter_table_user_set_created_at_updated_at_as_string
 */
class m200121_062722_alter_table_user_set_created_at_updated_at_as_string extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user','created_at','string');
        $this->alterColumn('user','updated_at','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('user','created_at','integer');
        $this->alterColumn('user','updated_at','integer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200121_062722_alter_table_user_set_created_at_updated_at_as_string cannot be reverted.\n";

        return false;
    }
    */
}
