<?php

use yii\db\Migration;

/**
 * Handles the creation of table `metro_station`.
 */
class m161117_123203_create_metro_station_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('metro_station', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'city_id' => $this->integer(),
            'line_id' => $this->integer(),
            'color' => $this->string(),
            'left' => $this->smallInteger(),
            'top' => $this->smallInteger(),
            'status' => $this->boolean(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('metro_station');
    }
}
