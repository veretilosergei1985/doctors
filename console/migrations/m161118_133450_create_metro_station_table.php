<?php

use yii\db\Migration;

/**
 * Handles the creation of table `metro_station`.
 */
class m161118_133450_create_metro_station_table extends Migration
{
    public function up()
    {
        $this->createTable('metro_station', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'line_id' => $this->integer(),
            'color' => $this->string(),
            'left' => $this->smallInteger()->notNull(),
            'top' => $this->smallInteger()->notNull(),
            'status' => $this->boolean(),
        ]);

        $this->addForeignKey(
            'fk-metro_station-city_id',
            'metro_station',
            'city_id',
            'city',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('metro_station');

        $this->dropForeignKey(
            'fk-metro_station-city_id',
            'metro_station'
        );
    }
}
