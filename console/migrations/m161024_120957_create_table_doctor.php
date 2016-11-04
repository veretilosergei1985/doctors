<?php

use yii\db\Migration;

class m161024_120957_create_table_doctor extends Migration
{
    public function up()
    {
        $this->createTable('doctor', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string()->notNull(),
            'middle_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'title' => $this->string()->null(),
            'experience' => $this->integer(2),
            'image' => $this->string()->null(),
            'description' => $this->text(),
            'details' => $this->text(),
            'education' => $this->text(),
            'association' => $this->text(),
            'course' => $this->text(),
        ]);

        $this->createIndex(
            'idx-doctor-first_name',
            'doctor',
            'first_name'
        );

        $this->createIndex(
            'idx-doctor-last_name',
            'doctor',
            'last_name'
        );

        $this->createIndex(
            'idx-doctor-middle_name',
            'doctor',
            'middle_name'
        );

        $this->createIndex(
            'idx-doctor-title',
            'doctor',
            'title'
        );

    }

    public function down()
    {
        $this->dropIndex(
            'idx-doctor-first_name',
            'doctor'
        );

        $this->dropIndex(
            'idx-doctor-last_name',
            'doctor'
        );

        $this->dropIndex(
            'idx-doctor-middle_name',
            'doctor'
        );

        $this->dropIndex(
            'idx-doctor-title',
            'doctor'
        );

        $this->dropTable('doctor');
    }
}
