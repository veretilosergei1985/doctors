<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $hospital_type
 * @property string $title
 * @property string $description
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $latitude
 * @property string $longitude
 * @property string $logo
 * @property integer $city_id
 * @property integer $district_id
 * @property integer $metro_id
 */
class Hospital extends \yii\db\ActiveRecord
{    
    public $file;    
    public $galleryFiles;
    public $hospital_type;

    const SCENARIO_DEFAULT                 = 'default';
    const SCENARIO_CREATE_PARENT_HOSPITAL  = 'create_parent_hospital';

    const TYPE_PARENT = 1;
    const TYPE_ALONE = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id, hospital_type', 'city_id', 'district_id', 'metro_id'], 'integer'],
            [['title', 'address', 'phone', 'hospital_type', 'description', 'latitude', 'longitude', 'city_id', 'district_id', 'metro_id'], 'required', 'on' => self::SCENARIO_DEFAULT],
            [['description'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['title', 'address', 'email', 'phone', 'logo'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],

            [['hospital_type', 'title', 'description', 'city_id', 'district_id', 'metro_id'], 'required', 'on' => self::SCENARIO_CREATE_PARENT_HOSPITAL],

            [['galleryFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
            [['specializations'], 'safe']
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => [
                'hospital_type', 'parent_id', 'city_id', 'title', 'description', 'address', 'phone', 'latitude', 'longitude', 'email', 'file', 'galleryFiles', 'specializations', 'district_id', 'metro_id'
            ],
            self::SCENARIO_CREATE_PARENT_HOSPITAL => [
                'hospital_type', 'title', 'description', 'specializations', 'city_id', 'district_id', 'metro_id'
            ]
        ];
    }

    public static $typeList = [
        self::TYPE_ALONE  => 'Is alone hospital',
        self::TYPE_PARENT => 'Is parent hospital',
    ];

    public function behaviors() {
        return [
            [
                'class' => \backend\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'specializations' => 'specializations',
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
            'id' => Yii::t('app/backend', 'ID'),
            'parent_id' => Yii::t('app/backend', 'Parent ID'),
            'parent_id' => Yii::t('app/backend', 'Parent ID'),
            'city_id' => Yii::t('app/backend', 'City ID'),
            'title' => Yii::t('app/backend', 'Title'),
            'description' => Yii::t('app/backend', 'Description'),
            'address' => Yii::t('app/backend', 'Address'),
            'email' => Yii::t('app/backend', 'Email'),
            'phone' => Yii::t('app/backend', 'Phone'),
            'latitude' => Yii::t('app/backend', 'Latitude'),
            'longitude' => Yii::t('app/backend', 'Longitude'),
            'logo' => Yii::t('app/backend', 'Logo'),
            'file' => Yii::t('app/backend', 'Logo'),
        ];
    }

    public static function getUploadDir() {
        return Yii::getAlias('@frontend') . '/web/uploads/hospitals/';
    }


    public function uploadGallery()
    {
        $path = self::getUploadDir() . $this->primaryKey . '/gallery';

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        foreach ($this->galleryFiles as $file) {
            $file->saveAs($path . '/' . $file->baseName  . '.' . $file->extension);
            $imageGallery = new HospitalGalerry;
            $imageGallery->image = $file->baseName  . '.' . $file->extension;
            $imageGallery->hospital_id = $this->primaryKey;
            $imageGallery->save();
        }
    }
    
    public function uploadLogo()
    {
        if ($this->file) {
            $path = Yii::getAlias('@frontend') . '/web/uploads/hospitals/' . $this->primaryKey;
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $this->file->saveAs($path . '/logo.jpg');
            $this->logo = 'logo.jpg';
            $this->detachBehaviors();
            $this->save(false);
        }        
    }
    
    public function getChildHospitals()
    {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    public function getGallery()
    {
        return $this->hasMany(HospitalGalerry::className(), ['hospital_id' => 'id']);
    }

    public function setGallery($gallery)
    {
        $this->populateRelation('gallery', $gallery);
    }
    
    public function getSchedules()
    {
        return $this->hasMany(HospitalShedule::className(), ['hospital_id' => 'id']);
    }

    public function setSchedules($schedules)
    {
        $this->populateRelation('schedules', $schedules);
    }

    public function getSpecializations()
    {
        return $this->hasMany(Specialization::className(), ['id' => 'specialization_id'])
            ->viaTable('hospital_specialization', ['hospital_id' => 'id']);
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
