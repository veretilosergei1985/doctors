<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use common\models\Hospital;

class HospitalController extends \yii\web\Controller
{
    const HOSPITALS_PER_PAGE = 5;
    
    public function init()
    {
        $this->layout = 'pages';
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }



    public function actionIndex()
    {      
        
        
        $dataProvider = new ActiveDataProvider([
            'query' => Hospital::find()->
                //joinWith('specializations')->
                //leftJoin('hospital_specialization', 'hospital_specialization.hospital_id = hospital.id')->
                //leftJoin('specialization', 'specialization.id = hospital_specialization.specialization_id')->
                where(['parent_id' => null])->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => self::HOSPITALS_PER_PAGE,
            ],
            //'sort' => ['attributes' => ['fullName']],
        ]);
                        
        return $this->render('index', [
            'listDataProvider' => $dataProvider,
            'hospitalPerPage' => self::HOSPITALS_PER_PAGE,
        ]);
    }

}
