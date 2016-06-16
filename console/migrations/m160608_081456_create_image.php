<?php

use yii\db\Migration;

/**
 * Handles the creation for table `image`.
 */
class m160608_081456_create_image extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('design', [
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
        $this->dropTable('design');
    }
}
