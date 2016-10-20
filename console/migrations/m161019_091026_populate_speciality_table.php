<?php

use yii\db\Migration;

class m161019_091026_populate_speciality_table extends Migration
{
    public function up()
    {
        $this->createTable('speciality', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->createTable('doctor_speciality', [
            'id' => $this->primaryKey(),
            'doctor_id' => $this->integer(),
            'speciality_id' => $this->integer(),
        ]);

        $this->execute("
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('aкушер','aкушер');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('аллерголог-иммунолог','аллерголог-иммунолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('ангионевролог','ангионевролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('ангиохирург','ангиохирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('андролог','андролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('анестезиолог-реаниматолог','анестезиолог-реаниматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('вертебролог','вертебролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('врач лечебной физкультуры','врач лечебной физкультуры');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('врач скорой помощи','врач скорой помощи');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('врач спортивной медицины','врач спортивной медицины');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('врач функциональной диагностики','врач функциональной диагностики');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гастроэнтеролог','гастроэнтеролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гематолог','гематолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('генетик','генетик');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гепатолог','гепатолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гинеколог','гинеколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гинеколог-эндокринолог','гинеколог-эндокринолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гирудотерапевт','гирудотерапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гнойный хирург','гнойный хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('гомеопат','гомеопат');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('дерматовенеролог','дерматовенеролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('дерматолог','дерматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский аллерголог-иммунолог','детский аллерголог-иммунолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский андролог','детский андролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский гастроэнтеролог','детский гастроэнтеролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский гинеколог','детский гинеколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский дерматолог','детский дерматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский кардиолог','детский кардиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский невролог','детский невролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский нефролог','детский нефролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский оториноларинголог','детский оториноларинголог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский офтальмолог','детский офтальмолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский психиатр','детский психиатр');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский психолог','детский психолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский стоматолог','детский стоматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский травматолог-ортопед','детский травматолог-ортопед');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский уролог','детский уролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский хирург','детский хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('детский эндокринолог','детский эндокринолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('диабетолог','диабетолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('диетолог','диетолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('инфекционист','инфекционист');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('кардиолог','кардиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('кардиолог-аритмолог','кардиолог-аритмолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('кардиохирург','кардиохирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('кинезиолог','кинезиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('косметолог','косметолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('лазерный хирург','лазерный хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('логопед','логопед');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('малоинвазивный хирург','малоинвазивный хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('маммолог','маммолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('мануальный терапевт','мануальный терапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('массажист','массажист');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('миколог','миколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('нарколог','нарколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('невролог','невролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('нейрофизиолог','нейрофизиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('нейрохирург','нейрохирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('неонатолог','неонатолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('нефролог','нефролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('онкогематолог','онкогематолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('онколог','онколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('онколог-гинеколог','онколог-гинеколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('онколог-маммолог','онколог-маммолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('остеопат','остеопат');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('отоневролог','отоневролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('оториноларинголог (лор)','оториноларинголог (лор)');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('офтальмолог','офтальмолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('офтальмолог-хирург','офтальмолог-хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('патологоанатом','патологоанатом');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('педиатр','педиатр');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('пластический хирург','пластический хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('проктолог','проктолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('профпатолог','профпатолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('психиатр','психиатр');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('психолог','психолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('психотерапевт','психотерапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('пульмонолог','пульмонолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('радиолог','радиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('реабилитолог','реабилитолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('ревматолог','ревматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('рентгенолог','рентгенолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('репродуктолог','репродуктолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('рефлексотерапевт','рефлексотерапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('сексопатолог','сексопатолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('семейный доктор','семейный доктор');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('сомнолог','сомнолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('стоматолог','стоматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('стоматолог-имплантолог','стоматолог-имплантолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('стоматолог-ортодонт','стоматолог-ортодонт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('стоматолог-ортопед','стоматолог-ортопед');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('стоматолог-пародонтолог','стоматолог-пародонтолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('стоматолог-хирург','стоматолог-хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('сурдолог','сурдолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('терапевт','терапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('торакальный хирург','торакальный хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('травматолог','травматолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('травматолог-ортопед','травматолог-ортопед');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('трансфузиолог','трансфузиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('трихолог','трихолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('узи-диагност','узи-диагност');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('уролог','уролог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('физиотерапевт','физиотерапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('фитотерапевт','фитотерапевт');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('флеболог','флеболог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('фтизиатр','фтизиатр');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('хирург','хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('хирург-гинеколог','хирург-гинеколог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('цитолог','цитолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('челюстно-лицевой хирург','челюстно-лицевой хирург');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('эмбриолог','эмбриолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('эндокринолог','эндокринолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('эндоскопист','эндоскопист');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('эпидемиолог','эпидемиолог');
                        INSERT INTO `speciality` (`title`, `description`) VALUES ('эпилептолог','эпилептолог');
        ");
    }

    public function down()
    {
        $this->dropTable('speciality');
    }

}
