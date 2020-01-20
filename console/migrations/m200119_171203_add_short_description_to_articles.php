<?php

use yii\db\Migration;

/**
 * Class m200119_171203_add_short_description_to_articles
 */
class m200119_171203_add_short_description_to_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('articles','short_description',$this->text()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('articles','short_description');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200119_171203_add_short_description_to_articles cannot be reverted.\n";

        return false;
    }
    */
}
