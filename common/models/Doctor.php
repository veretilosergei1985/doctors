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
 * @property integer $experience
 * @property string $image
 * @property string $description
 * @property string $details
 * @property string $education
 * @property string $association
 * @property string $course
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
            [['description', 'details', 'education', 'association', 'course'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'title', 'image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'title' => Yii::t('app', 'Title'),
            'experience' => Yii::t('app', 'Experience'),
            'image' => Yii::t('app', 'Image'),
            'description' => Yii::t('app', 'Description'),
            'details' => Yii::t('app', 'Details'),
            'education' => Yii::t('app', 'Education'),
            'association' => Yii::t('app', 'Association'),
            'course' => Yii::t('app', 'Course'),
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
        $this->populateRelation('specialities', $specialities);
    }

    public function getProcedures()
    {
        return $this->hasMany(Speciality::className(), ['id' => 'procedure_id'])
            ->viaTable('doctor_procedure', ['doctor_id' => 'id']);
    }

    public function setProcedures($procedures)
    {
        $this->populateRelation('procedures', $procedures);
    }

    /*
    public function getEducation()
    {
        return $this->hasOne(Education::className(), ['doctor_id' => 'id']);
    }

    public function setEducation($education)
    {
        $this->populateRelation('education', $education);
    }

    public function getAssociation()
    {
        return $this->hasOne(Association::className(), ['doctor_id' => 'id']);
    }

    public function setAssociation($education)
    {
        $this->populateRelation('association', $education);
    }

    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['doctor_id' => 'id']);
    }
    */
    public function saveRelations()
    {
        $this->unlinkAll('specialities', true);
        $specialities = Yii::$app->request->post('Doctor')['specialities'];
        if (!empty($specialities)) {
            foreach ($specialities as $speciality) {
                Yii::$app->db->createCommand()->batchInsert('doctor_speciality', ['doctor_id', 'speciality_id'], [[$this->primaryKey, $speciality]])->execute();
            }
        }
        /*
        $education = $this->education;
        $education->load(Yii::$app->request->post());
        $this->setEducation($education);
        $education->save();
        */
    }
}
