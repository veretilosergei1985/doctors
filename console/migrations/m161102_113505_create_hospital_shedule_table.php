<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hospital_shedule`.
 */
class m161102_113505_create_hospital_shedule_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('hospital_shedule', [
            'id' => $this->primaryKey(),
            'hospital_id' => $this->integer()->notNull(),
            'day' => $this->string(255)->notNull(),
            'time' => $this->string(255)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-hospital_shedule-hospital_id',
            'hospital_shedule',
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
            'fk-hospital_shedule-hospital_id',
            'hospital_shedule'
        );

        $this->dropTable('hospital_shedule');
    }
}
