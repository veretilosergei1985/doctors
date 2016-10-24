<?php

use yii\db\Migration;

class m161024_131654_create_table_procedure extends Migration
{
    public function up()
    {
        $this->createTable('procedure', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->createTable('doctor_procedure', [
            'id' => $this->primaryKey(),
            'doctor_id' => $this->integer(),
            'procedure_id' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('procedure');
    }
}
