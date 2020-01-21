<?php

use yii\db\Migration;

/**
 * Class m200120_121110_comments_table_altered_again
 */
class m200120_121110_comments_table_altered_again extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comments','user','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comments','user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200120_121110_comments_table_altered_again cannot be reverted.\n";

        return false;
    }
    */
}
