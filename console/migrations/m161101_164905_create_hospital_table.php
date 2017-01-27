<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hospital`.
 */
class m161101_164905_create_hospital_table extends Migration
{
    public function up()
    {
        $this->createTable('hospital', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'address' => $this->string(255)->notNull(),
            'email' => $this->string(255),
            'phone' => $this->string(255)->notNull(),
            'latitude' => $this->decimal(10, 6),
            'longitude' => $this->decimal(10, 6),
            'logo' => $this->string(255),
            'city_id' => $this->integer(),
            'district_id' => $this->integer(),
            'metro_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-hospital-parent_id',
            'hospital',
            'parent_id'
        );

        $this->createIndex(
            'idx-hospital-title',
            'hospital',
            'title'
        );
    }

    public function down()
    {
        $this->dropIndex(
            'idx-hospital-parent_id',
            'hospital'
        );

        $this->dropIndex(
            'idx-hospital-title',
            'hospital'
        );

        $this->dropTable('hospital');
    }
}
