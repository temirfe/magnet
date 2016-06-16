<?php

use yii\db\Migration;

/**
 * Handles the creation for table `web`.
 */
class m160615_175942_create_web extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('web', [
            'id' => $this->primaryKey(),
            'main_img'=>$this->string('20')->notNull(),
            'text'=>$this->text()->notNull(),
            'title'=>$this->string()->notNull(),
            'description'=>$this->string('500')->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('web');
    }
}
