<?php
namespace backend\controllers;

use backend\models\DoctorSearch;
use common\models\Doctor;
use common\models\Education;
use common\models\Speciality;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class DoctorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'info', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
        ];
    }

    public function actionIndex()
    {
        $searchModel = new DoctorSearch();

        $dataProvider = new ActiveDataProvider([
            'query' => Doctor::find(),
            'sort' => [
                'attributes' => [
                    'last_name',
                    'first_name',
                    'middle_name',
                    'title',
                    'experience',
                ],
            ],
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionInfo()
    {
        $request = Yii::$app->request;
        $doctorId = $request->post('expandRowKey');
        $doctor = Doctor::findOne($doctorId);

        return $this->renderPartial('_info_item', [
                'doctor' => $doctor,
            ]
        );
    }

    /**
     * Displays a single Doctor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Doctor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $education = $model->education;
            $education->load(Yii::$app->request->post());
            $model->setEducation($education);
            $education->save();

            $specialities = $model->specialities;
//            //echo "<pre>"; print_r($specialities); exit;
            //$specialities->load(Yii::$app->request->post());
            $model->setSpecialities(Yii::$app->request->post('Specialities'));
//            $specialities->save();

            //$model->unlinkAll('specialities', $specialities);
//            $specialities = new Speciality();
//            $specialities->load(Yii::$app->request->post());
//            $model->link('specialities', $specialities);

//            $model->children = $_POST['Child'];
//        if ($model->saveWithRelated('children'))


            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Doctor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
