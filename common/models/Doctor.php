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
            [['first_name', 'middle_name', 'last_name', 'title', 'description', 'experience'], 'required'],
            [['description', 'details', 'education', 'association', 'course'], 'string'],
            [['first_name', 'middle_name', 'last_name', 'title', 'image'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['specialities', 'procedures', 'diseases'], 'safe']
        ];
    }
    
    public function behaviors() {
        return [
            [
                'class' => \backend\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'specialities' => 'specialities',
                    'procedures' => 'procedures',
                    'diseases' => 'diseases',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app/backend', 'First Name'),
            'middle_name' => Yii::t('app/backend', 'Middle Name'),
            'last_name' => Yii::t('app/backend', 'Last Name'),
            'title' => Yii::t('app/backend', 'Title'),
            'experience' => Yii::t('app/backend', 'Experience'),
            'image' => Yii::t('app/backend', 'Image'),
            'description' => Yii::t('app/backend', 'Description'),
            'details' => Yii::t('app/backend', 'Details'),
            'education' => Yii::t('app/backend', 'Education'),
            'association' => Yii::t('app/backend', 'Association'),
            'course' => Yii::t('app/backend', 'Course'),
            'image' => Yii::t('app/backend', 'Photo'),
            'file' => Yii::t('app/backend', 'Photo'),
        ];
    }

    public function getFullName() {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }

    public function getSpecialities()
    {
        return $this->hasMany(Speciality::className(), ['id' => 'speciality_id'])
            ->viaTable('doctor_speciality', ['doctor_id' => 'id']);
    }
    
    public function getProcedures()
    {
        return $this->hasMany(Speciality::className(), ['id' => 'procedure_id'])
            ->viaTable('doctor_procedure', ['doctor_id' => 'id']);
    }

    public function getDiseases()
    {
        return $this->hasMany(Disease::className(), ['id' => 'disease_id'])
            ->viaTable('doctor_disease', ['doctor_id' => 'id']);
    }
    
    public function saveRelations()
    {
    }
}
