<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hospital_gallery`.
 */
class m161106_154016_create_hospital_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('hospital_galerry', [
            'id' => $this->primaryKey(),
            'hospital_id' => $this->integer(),
            'image' => $this->string(255),
        ]);

        $this->addForeignKey(
            'fk-hospital_galerry-hospital_id',
            'hospital_galerry',
            'hospital_id',
            'hospital',
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
            'fk-hospital_galerry-hospital_id',
            'hospital_galerry'
        );

        $this->dropForeignKey(
            'fk-hospital_2_attributes-attribute_id',
            'hospital_2_attributes'
        );

        $this->dropTable('hospital_galerry');
    }
}
