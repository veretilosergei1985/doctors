<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $title
 * @property string $description
 * @property string $image
 */
class Doctor extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'middle_name', 'last_name', 'title', 'description'], 'required'],
            [['description'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'title'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'title' => 'Title',
            'description' => 'Description',
            'specialities' => yii::t('app', 'Specialities'),
            //'fullName' => Yii::t('app', 'Full Name')
        ];
    }

    public function getFullName() {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialities()
    {
        return $this->hasMany(Speciality::className(), ['id' => 'speciality_id'])
            ->viaTable('doctor_speciality', ['doctor_id' => 'id']);
    }

    public function setSpecialities($specialities)
    {
        //echo "<pre>"; print_r($this->getRelatedRecords()); exit;
        $this->populateRelation('specialities', $specialities);
    }

    public function getEducation()
    {
        return $this->hasOne(Education::className(), ['doctor_id' => 'id']);
    }

    public function setEducation($education)
    {
        $this->populateRelation('education', $education);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['doctor_id' => 'id']);
    }

    public function saveRelations()
    {
        $this->unlinkAll('specialities', true);
        $specialities = Yii::$app->request->post('Doctor')['specialities'];
        if (!empty($specialities)) {
            foreach ($specialities as $speciality) {
                Yii::$app->db->createCommand()->batchInsert('doctor_speciality', ['doctor_id', 'speciality_id'], [[$this->primaryKey, $speciality]])->execute();
            }
        }

        $education = $this->education;
        $education->load(Yii::$app->request->post());
        $this->setEducation($education);
        $education->save();
    }
}
