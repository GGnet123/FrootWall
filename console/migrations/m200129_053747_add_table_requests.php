<?php

use yii\db\Migration;

/**
 * Class m200129_053747_add_table_requests
 */
class m200129_053747_add_table_requests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('requests',[
            'id'=>$this->primaryKey(),
            'category_id'=>$this->integer()->notNull(),
            'date'=>$this->string(),
            'from_user_id'=>$this->integer()->notNull(),
            'to_users_id'=>$this->string()->notNull(),
            'status'=>$this->smallInteger()->defaultValue(1),
            'docs'=>$this->string(),
            'created_at'=>$this->string()->defaultValue(date('Y-m-d h:m:s'))
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('requests');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200129_053747_add_table_requests cannot be reverted.\n";

        return false;
    }
    */
}
