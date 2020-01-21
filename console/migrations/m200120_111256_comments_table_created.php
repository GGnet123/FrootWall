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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('comments',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(),
            'comment'=>$this->text(),
            'article_id'=>$this->integer()
        ],$tableOptions);
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
