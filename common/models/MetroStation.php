<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "metro_station".
 *
 * @property integer $id
 * @property string $title
 * @property integer $city_id
 * @property integer $line_id
 * @property string $color
 * @property integer $left
 * @property integer $top
 * @property integer $status
 */
class MetroStation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'metro_station';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'city_id', 'left', 'top'], 'required'],
            [['city_id', 'line_id', 'left', 'top', 'status'], 'integer'],
            [['title', 'color'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
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
            'city_id' => Yii::t('app', 'City ID'),
            'line_id' => Yii::t('app', 'Line ID'),
            'color' => Yii::t('app', 'Color'),
            'left' => Yii::t('app', 'Left'),
            'top' => Yii::t('app', 'Top'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
