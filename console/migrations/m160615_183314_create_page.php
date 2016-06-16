<?php

use yii\db\Migration;

/**
 * Handles the creation for table `page`.
 */
class m160615_183314_create_page extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'text'=>$this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page');
    }
}
