<?php

use yii\db\Migration;

class m161024_131654_create_table_procedure extends Migration
{
    public function up()
    {
        $this->createTable('procedure', [
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->createIndex(
            'idx-procedure-title',
            'procedure',
            'title'
        );

        $this->createTable('doctor_procedure', [
            'doctor_id' => $this->integer(),
            'procedure_id' => $this->integer(),
        ]);

        $this->addPrimaryKey('doctor_procedure_pk', 'doctor_procedure', ['doctor_id', 'procedure_id']);
    }

    public function down()
    {
        $this->dropIndex(
            'idx-procedure-title',
            'procedure'
        );

        $this->dropTable('procedure');

        $this->dropIndex(
            'doctor_procedure_pk',
            'doctor_procedure'
        );

        $this->dropTable('doctor_procedure');
    }
}
