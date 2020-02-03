<?php

use yii\db\Migration;

class m200129_161213_alter_table_requests_created_at extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('requests','created_at','string');
    }

    public function safeDown()
    {
        $this->alterColumn('requests','created_at','string');
    }

}
