<?php

use yii\db\Migration;

/**
 * Class m200127_070237_alter_table_user_add_column_category_id
 */
class m200127_070237_alter_table_user_add_column_category_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','category_id','integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','category_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200127_070237_alter_table_user_add_column_category_id cannot be reverted.\n";

        return false;
    }
    */
}
