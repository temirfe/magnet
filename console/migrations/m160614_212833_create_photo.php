<?php

use yii\db\Migration;

/**
 * Handles the creation for table `photo`.
 */
class m160614_212833_create_photo extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('photo', [
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
        $this->dropTable('photo');
    }
}
