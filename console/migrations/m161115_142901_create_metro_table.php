<?php

use yii\db\Migration;

/**
 * Handles the creation of table `metro`.
 */
class m161115_142901_create_metro_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('metro', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('metro');
    }
}
