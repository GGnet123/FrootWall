<?php

use yii\db\Migration;

/**
 * Class m200120_111256_comments_table_created
 */
class m200120_111256_comments_table_created extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(),
            'comment'=>$this->text(),
            'article_id'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200120_111256_comments_table_created cannot be reverted.\n";

        return false;
    }
    */
}
