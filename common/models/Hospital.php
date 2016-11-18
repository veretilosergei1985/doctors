<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $description
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $latitude
 * @property string $longitude
 * @property string $logo
 */
class Hospital extends \yii\db\ActiveRecord
{    
    public $file;    
    public $galleryFiles;

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
            [['parent_id'], 'integer'],
            [['title', 'address', 'phone'], 'required'],
            [['description'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['title', 'address', 'email', 'phone', 'logo'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['galleryFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 10],
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
            $this->save(false);
        }        
    }
    
    public function getGallery()
    {
        return $this->hasMany(HospitalGalerry::className(), ['hospital_id' => 'id']);
    }

    public function setGallery($gallery)
    {
        $this->populateRelation('gallery', $gallery);
    }
}
