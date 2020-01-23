<?php

use yii\db\Migration;

/**
 * Class m200123_080327_alter_user_table_for_profile_info
 */
class m200123_080327_alter_user_table_for_profile_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','image','string');
        $this->addColumn('user','phone_number','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','image');
        $this->dropColumn('user','phone_number');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200123_080327_alter_user_table_for_profile_info cannot be reverted.\n";

        return false;
    }
    */
}
