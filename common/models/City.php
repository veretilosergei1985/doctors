<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property string $metro_map
 */
class City extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'code'], 'required'],
            [['title', 'code', 'metro_map'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'png, jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'code' => Yii::t('app', 'Code'),
            'metro_map' => Yii::t('app', 'Metro Map'),
        ];
    }

    public function getStations()
    {
        return $this->hasMany(MetroStation::className(), ['city_id' => 'id']);
    }

    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['id' => 'district_id'])
            ->viaTable('city_district', ['city_id' => 'id']);
    }

    public function uploadMetroMap()
    {
        if ($this->file) {
            $path = Yii::getAlias('@frontend') . '/web/uploads/city/' . $this->primaryKey;
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $this->file->saveAs($path . '/map.jpg');
            $this->metro_map = 'map.jpg';
            $this->save(false);
        }
    }
}
