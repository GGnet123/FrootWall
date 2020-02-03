<?php

use yii\db\Migration;

/**
 * Class m200202_103001_alter_user_column_add_about_date_of_coming
 */
class m200202_103001_alter_user_column_add_about_date_of_coming extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('articles','short_description','string(100)');

        $this->addColumn('user','about','string');
        $this->addColumn('user','come_date','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','about');
        $this->dropColumn('user','come_date');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200202_103001_alter_user_column_add_about_date_of_coming cannot be reverted.\n";

        return false;
    }
    */
}
