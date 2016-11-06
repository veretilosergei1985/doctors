<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital_galerry".
 *
 * @property integer $id
 * @property integer $hospital_id
 * @property string $image
 */
class HospitalGalerry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospital_galerry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospital_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospital::className(), 'targetAttribute' => ['hospital_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hospital_id' => Yii::t('app', 'Hospital ID'),
            'image' => Yii::t('app', 'Image'),
        ];
    }
}
