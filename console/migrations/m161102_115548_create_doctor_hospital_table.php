<?php

use yii\db\Migration;

/**
 * Handles the creation of table `doctor_hospital`.
 */
class m161102_115548_create_doctor_hospital_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('doctor_hospital', [
            'doctor_id' => $this->integer(),
            'hospital_id' => $this->integer(),
        ]);

        $this->addPrimaryKey('doctor_hospital_pk', 'doctor_hospital', ['doctor_id', 'hospital_id']);

        $this->addForeignKey(
            'fk-doctor_hospital-doctor_id',
            'doctor_hospital',
            'doctor_id',
            'doctor',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-doctor_hospital-hospital_id',
            'doctor_hospital',
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
            'fk-doctor_hospital-doctor_id',
            'hospital_specialization'
        );

        $this->dropForeignKey(
            'fk-doctor_hospital-hospital_id',
            'hospital_specialization'
        );

        $this->dropTable('doctor_hospital');
    }
}
