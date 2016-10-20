<?php

use yii\db\Migration;

class m161020_102405_populate_course_table extends Migration
{
    public function up()
    {
        $this->createTable('course', [
            'id' => $this->primaryKey(),
            'doctor_id' => $this->integer()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey("course_fk", "course", "doctor_id", "doctor", "id", "CASCADE", "CASCADE");
    }

    public function down()
    {
        $this->dropTable('course');
    }
}
