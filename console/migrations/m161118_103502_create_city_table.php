<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m161118_103502_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'code' => $this->string()->notNull(),
            'metro_map' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city');
    }
}
