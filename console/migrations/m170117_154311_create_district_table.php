<?php

use yii\db\Migration;

/**
 * Handles the creation of table `district`.
 */
class m170117_154311_create_district_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('district', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'city_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-district-title',
            'district',
            'title'
        );

        $this->createTable('hospital_district', [
            'hospital_id' => $this->integer(),
            'district_id' => $this->integer(),
        ]);

        $this->createTable('city_district', [
            'city_id' => $this->integer(),
            'district_id' => $this->integer(),
        ]);

        $this->addPrimaryKey('hospital_district_pk', 'hospital_district', ['hospital_id', 'district_id']);
        $this->addPrimaryKey('city_district_pk', 'city_district', ['city_id', 'district_id']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('district');
    }
}
