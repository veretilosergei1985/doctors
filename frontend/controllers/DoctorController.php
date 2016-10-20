<?php
namespace frontend\controllers;

use common\models\Doctor;
use common\models\Specialty;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class DoctorController extends Controller
{
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
        //echo "<pre>"; print_r(Doctor::find()->all()); exit;

//        $items = Doctor::find()->all();
//        foreach ($items as $item) {
//            echo "<pre>"; print_r($item->specialities[0]->title); exit;
//
//        }

        $dataProvider = new ActiveDataProvider([
            'query' => Doctor::find()->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 2,
            ],
            //'sort' => ['attributes' => ['fullName']],
        ]);

        //$this->view->title = 'Doctors List';
        return $this->render('index', ['listDataProvider' => $dataProvider]);
    }
}