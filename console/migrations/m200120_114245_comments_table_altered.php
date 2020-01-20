<?php

use yii\db\Migration;

/**
 * Class m200120_114245_comments_table_altered
 */
class m200120_114245_comments_table_altered extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comments','created_at','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200120_114245_comments_table_altered cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200120_114245_comments_table_altered cannot be reverted.\n";

        return false;
    }
    */
}
