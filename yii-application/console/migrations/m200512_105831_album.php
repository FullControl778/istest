<?php

use yii\db\Migration;

/**
 * Class m200512_105831_album
 */
class m200512_105831_album extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'creator' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('album');
    }
}
