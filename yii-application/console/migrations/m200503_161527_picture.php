<?php

use yii\db\Migration;

/**
 * Class m200503_161527_picture
 */
class m200503_161527_picture extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('picture', [
            'id' => $this->primaryKey(),
            'album' => $this->string()->notNull(),
            'filename' => $this->string()->notNull(),
            'user' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('picture');
    }
}
