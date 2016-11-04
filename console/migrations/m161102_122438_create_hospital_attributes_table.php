<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hospital_attributes`.
 */
class m161102_122438_create_hospital_attributes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('hospital_attributes', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'icon' => $this->string(255),
        ]);

        $this->createTable('hospital_2_attributes', [
            'hospital_id' => $this->integer(),
            'attribute_id' => $this->integer(),
        ]);

        $this->addPrimaryKey('hospital_2_attributes_pk', 'hospital_2_attributes', ['hospital_id', 'attribute_id']);

        $this->addForeignKey(
            'fk-hospital_2_attributes-hospital_id',
            'hospital_2_attributes',
            'hospital_id',
            'hospital',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-hospital_2_attributes-attribute_id',
            'hospital_2_attributes',
            'attribute_id',
            'hospital_attributes',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-hospital_2_attributes-hospital_id',
            'hospital_2_attributes'
        );

        $this->dropForeignKey(
            'fk-hospital_2_attributes-attribute_id',
            'hospital_2_attributes'
        );

        $this->dropTable('hospital_attributes');
    }
}
