<?php

use yii\db\Migration;

/**
 * Handles the creation for table `rent`.
 */
class m160615_181432_create_rent extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rent', [
            'id' => $this->primaryKey(),
            'text'=>$this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rent');
    }
}
