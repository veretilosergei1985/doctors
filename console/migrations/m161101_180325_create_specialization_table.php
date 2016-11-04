<?php

use yii\db\Migration;

/**
 * Handles the creation of table `specialization`.
 */
class m161101_180325_create_specialization_table extends Migration
{
    public function up()
    {
        $this->createTable('specialization', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->createTable('hospital_specialization', [
            //'id' => $this->primaryKey(),
            'hospital_id' => $this->integer(),
            'specialization_id' => $this->integer(),
        ]);

        $this->addPrimaryKey('hospital_specialization_pk', 'hospital_specialization', ['hospital_id', 'specialization_id']);

        $this->addForeignKey(
            'fk-specialization-hospital_id',
            'hospital_specialization',
            'hospital_id',
            'hospital',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-specialization-specialization_id',
            'hospital_specialization',
            'specialization_id',
            'specialization',
            'id',
            'CASCADE'
        );

        $this->execute("
                        INSERT INTO `specialization` (`title`) VALUES ('Акушерство');
                        INSERT INTO `specialization` (`title`) VALUES ('Аллергология-иммунология');
                        INSERT INTO `specialization` (`title`) VALUES ('Анализы');
                        INSERT INTO `specialization` (`title`) VALUES ('Ангионеврология');
                        INSERT INTO `specialization` (`title`) VALUES ('Ангиохирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Андрология');
                        INSERT INTO `specialization` (`title`) VALUES ('Анестезиология-реаниматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Гастроэнтерология');
                        INSERT INTO `specialization` (`title`) VALUES ('Гематология');
                        INSERT INTO `specialization` (`title`) VALUES ('Генетика');
                        INSERT INTO `specialization` (`title`) VALUES ('Гепатобилиарная хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Гепатология');
                        INSERT INTO `specialization` (`title`) VALUES ('Гинекология');
                        INSERT INTO `specialization` (`title`) VALUES ('Гирудотерапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Гнойная хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Гомеопатия');
                        INSERT INTO `specialization` (`title`) VALUES ('Дерматовенерология');
                        INSERT INTO `specialization` (`title`) VALUES ('Дерматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская аллергология-иммунология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская гастроэнтерология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская гинекология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская дерматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская кардиология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская неврология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская нефрология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская ортопедия');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская оториноларингология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская офтальмология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская психиатрия');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская стоматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская травматология-ортопедия');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская урология');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Детская эндокринология');
                        INSERT INTO `specialization` (`title`) VALUES ('Диабетология');
                        INSERT INTO `specialization` (`title`) VALUES ('Диетология');
                        INSERT INTO `specialization` (`title`) VALUES ('Инфекционистика');
                        INSERT INTO `specialization` (`title`) VALUES ('Кардиология');
                        INSERT INTO `specialization` (`title`) VALUES ('Кардиолого-аритмология');
                        INSERT INTO `specialization` (`title`) VALUES ('Кардиохирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Косметология');
                        INSERT INTO `specialization` (`title`) VALUES ('Лазерная хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Лечебная физическая культура (ЛФК)');
                        INSERT INTO `specialization` (`title`) VALUES ('Лечение ВИЧ-инфекции');
                        INSERT INTO `specialization` (`title`) VALUES ('Логопедия');
                        INSERT INTO `specialization` (`title`) VALUES ('Малоинвазивная хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Маммология');
                        INSERT INTO `specialization` (`title`) VALUES ('Мануальная терапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Массаж');
                        INSERT INTO `specialization` (`title`) VALUES ('Медицина для всей семьи');
                        INSERT INTO `specialization` (`title`) VALUES ('Микология');
                        INSERT INTO `specialization` (`title`) VALUES ('МРТ (Магнитно-резонансная томография)');
                        INSERT INTO `specialization` (`title`) VALUES ('Наркология');
                        INSERT INTO `specialization` (`title`) VALUES ('Неврология');
                        INSERT INTO `specialization` (`title`) VALUES ('Нейрохирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Неонатология');
                        INSERT INTO `specialization` (`title`) VALUES ('Нефрология');
                        INSERT INTO `specialization` (`title`) VALUES ('Ожоговая хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Онкогематология');
                        INSERT INTO `specialization` (`title`) VALUES ('Онколог-маммология');
                        INSERT INTO `specialization` (`title`) VALUES ('Онколог-радиология');
                        INSERT INTO `specialization` (`title`) VALUES ('Онколог-химиотерапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Онкология');
                        INSERT INTO `specialization` (`title`) VALUES ('Оперативная эндоскопия');
                        INSERT INTO `specialization` (`title`) VALUES ('Остеопатия');
                        INSERT INTO `specialization` (`title`) VALUES ('Отоневрология');
                        INSERT INTO `specialization` (`title`) VALUES ('Оториноларингология');
                        INSERT INTO `specialization` (`title`) VALUES ('Офтальмология');
                        INSERT INTO `specialization` (`title`) VALUES ('Офтальмология-хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Паразитология');
                        INSERT INTO `specialization` (`title`) VALUES ('Патологоанатомия');
                        INSERT INTO `specialization` (`title`) VALUES ('Педиатрия');
                        INSERT INTO `specialization` (`title`) VALUES ('Пластическая хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Проктология');
                        INSERT INTO `specialization` (`title`) VALUES ('Профпатология');
                        INSERT INTO `specialization` (`title`) VALUES ('Психиатрия');
                        INSERT INTO `specialization` (`title`) VALUES ('Психология');
                        INSERT INTO `specialization` (`title`) VALUES ('Психотерапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Пульмонология');
                        INSERT INTO `specialization` (`title`) VALUES ('Радиология');
                        INSERT INTO `specialization` (`title`) VALUES ('Реабилитология');
                        INSERT INTO `specialization` (`title`) VALUES ('Ревматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Рентгенология');
                        INSERT INTO `specialization` (`title`) VALUES ('Репродуктология');
                        INSERT INTO `specialization` (`title`) VALUES ('Рефлексотерапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Сексология');
                        INSERT INTO `specialization` (`title`) VALUES ('Скорая помощь');
                        INSERT INTO `specialization` (`title`) VALUES ('Сомнология');
                        INSERT INTO `specialization` (`title`) VALUES ('Спортивная медицина');
                        INSERT INTO `specialization` (`title`) VALUES ('Стоматолог пародонтическая');
                        INSERT INTO `specialization` (`title`) VALUES ('Стоматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Стоматология ортодонтическая');
                        INSERT INTO `specialization` (`title`) VALUES ('Стоматология ортопедическая');
                        INSERT INTO `specialization` (`title`) VALUES ('Стоматология хирургическая');
                        INSERT INTO `specialization` (`title`) VALUES ('Судебно-медицинская экспертиза');
                        INSERT INTO `specialization` (`title`) VALUES ('Сурдология');
                        INSERT INTO `specialization` (`title`) VALUES ('Терапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Токсикология');
                        INSERT INTO `specialization` (`title`) VALUES ('Торакальная хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Травматология');
                        INSERT INTO `specialization` (`title`) VALUES ('Травматология-ортопедия');
                        INSERT INTO `specialization` (`title`) VALUES ('Трансфузиология');
                        INSERT INTO `specialization` (`title`) VALUES ('Трихология');
                        INSERT INTO `specialization` (`title`) VALUES ('УЗИ диагностика');
                        INSERT INTO `specialization` (`title`) VALUES ('Урология');
                        INSERT INTO `specialization` (`title`) VALUES ('Фармакология клиническая');
                        INSERT INTO `specialization` (`title`) VALUES ('Физиотерапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Фитотерапия');
                        INSERT INTO `specialization` (`title`) VALUES ('Флебология');
                        INSERT INTO `specialization` (`title`) VALUES ('Фтизиатрия');
                        INSERT INTO `specialization` (`title`) VALUES ('Функциональная диагностика');
                        INSERT INTO `specialization` (`title`) VALUES ('Хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('Челюстно-лицевая хирургия');
                        INSERT INTO `specialization` (`title`) VALUES ('ЭКО');
                        INSERT INTO `specialization` (`title`) VALUES ('Эмбриология');
                        INSERT INTO `specialization` (`title`) VALUES ('Эндокринология');
                        INSERT INTO `specialization` (`title`) VALUES ('Эндоскопия');
                        INSERT INTO `specialization` (`title`) VALUES ('Эпидемиология');
                        INSERT INTO `specialization` (`title`) VALUES ('Эпилептология');
                        ");
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-specialization-hospital_id',
            'hospital_specialization'
        );

        $this->dropForeignKey(
            'fk-specialization-specialization_id',
            'hospital_specialization'
        );

        $this->dropTable('specialization');
        $this->dropTable('hospital_specialization');

    }
}
