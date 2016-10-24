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
    }

    public function down()
    {
        $this->dropTable('doctor');
    }
}
