<?php

use yii\db\Migration;

/**
 * Handles the creation for table `video`.
 */
class m160608_084031_create_video extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('video', [
            'id' => $this->primaryKey(),
            'main_img'=>$this->string('20')->notNull(),
            'thumb_url'=>$this->string('100')->notNull(),
            'embed'=>$this->string('1000')->notNull(),
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
        $this->dropTable('video');
    }
}
