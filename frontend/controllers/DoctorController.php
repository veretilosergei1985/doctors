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
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class DoctorController extends Controller
{
    const DOCTRORS_PER_PAGE = 5;
    
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
                'pageSize' => self::DOCTRORS_PER_PAGE,
            ],
            //'sort' => ['attributes' => ['fullName']],
        ]);
        return $this->render('index', [
            'listDataProvider' => $dataProvider,
            'doctorsPerPage' => self::DOCTRORS_PER_PAGE,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', ['model' => $model]);
    }

    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}