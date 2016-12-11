<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital_shedule".
 *
 * @property integer $id
 * @property integer $hospital_id
 * @property string $day
 * @property string $time
 */
class HospitalShedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospital_shedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospital_id', 'day', 'time'], 'required'],
            [['hospital_id'], 'integer'],
            [['day', 'time'], 'string', 'max' => 255],
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospital::className(), 'targetAttribute' => ['hospital_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/backend', 'ID'),
            'hospital_id' => Yii::t('app/backend', 'Hospital ID'),
            'day' => Yii::t('app/backend', 'Day'),
            'time' => Yii::t('app/backend', 'Time'),
        ];
    }
}
