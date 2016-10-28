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
        $dataProvider = new ActiveDataProvider([
            'query' => Doctor::find()->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 10,
            ],
            //'sort' => ['attributes' => ['fullName']],
        ]);
        return $this->render('index', ['listDataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        return $this->render('view', []);
    }
}