<?php

use yii\db\Migration;

class m160616_185405_addcol_user extends Migration
{
    public function up()
    {
        $this->addColumn('user','role','varchar(32) NOT NULL');

    }

    public function down()
    {
        echo "m160616_185405_addcol_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
