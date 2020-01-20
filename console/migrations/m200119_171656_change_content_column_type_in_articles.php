<?php

use yii\db\Migration;

/**
 * Class m200119_171656_change_content_column_type_in_articles
 */
class m200119_171656_change_content_column_type_in_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('articles','content',$this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('articles','content',$this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200119_171656_change_content_column_type_in_articles cannot be reverted.\n";

        return false;
    }
    */
}
