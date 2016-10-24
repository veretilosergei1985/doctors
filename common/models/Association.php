<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "association".
 *
 * @property integer $id
 * @property integer $doctor_id
 * @property string $description
 */
class Association extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'association';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id'], 'required'],
            [['doctor_id'], 'integer'],
            [['description'], 'string'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'doctor_id' => Yii::t('app', 'Doctor ID'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
