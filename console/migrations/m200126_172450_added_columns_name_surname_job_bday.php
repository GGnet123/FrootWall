<?php

use yii\db\Migration;

/**
 * Class m200126_172450_added_columns_name_surname_job_bday
 */
class m200126_172450_added_columns_name_surname_job_bday extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','first_name','string');
        $this->addColumn('user','last_name','string');
        $this->addColumn('user','job','string');
        $this->addColumn('user','date_of_birth','string');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','first_name');
        $this->dropColumn('user','last_name');
        $this->dropColumn('user','job');
        $this->dropColumn('user','date_of_birth');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200126_172450_added_columns_name_surname_job_bday cannot be reverted.\n";

        return false;
    }
    */
}
