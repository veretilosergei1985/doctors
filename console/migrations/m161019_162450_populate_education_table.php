<?php

use yii\db\Migration;

class m161019_162450_populate_education_table extends Migration
{
    public function up()
    {

        $this->createTable('education', [
            'id' => $this->primaryKey(),
            'doctor_id' => $this->integer()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey("education_fk", "education", "doctor_id", "doctor", "id", "CASCADE", "CASCADE");
    }

    public function down()
    {
        $this->dropTable('education');
    }
}
