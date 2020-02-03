<?php

use yii\db\Migration;

/**
 * Class m200203_072326_alter_comments
 */
class m200203_072326_alter_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('comments','title');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('comments','title',$this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200203_072326_alter_comments cannot be reverted.\n";

        return false;
    }
    */
}
