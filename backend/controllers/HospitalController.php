<?php

namespace backend\controllers;

use kartik\form\ActiveForm;
use Yii;
use common\models\Hospital;
use backend\models\HospitalSearch;
use yii\base\Response;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HospitalController implements the CRUD actions for Hospital model.
 */
class HospitalController extends Controller
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
                        'actions' => ['error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'update', 'create', 'view', 'delete-schedule', 'delete-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Hospital models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HospitalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hospital model.
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
     * Creates a new Hospital model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = '', $step = '')
    {
        if ($step == 'info') {
            $model = new Hospital();
            $model->hospital_type = Hospital::TYPE_ALONE;

            if (\Yii::$app->request->isAjax) {
                $model->load(Yii::$app->request->post());
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                if ($model->hospital_type == Hospital::TYPE_PARENT) {
                    $model->setScenario(Hospital::SCENARIO_CREATE_PARENT_HOSPITAL);
                }

                return ActiveForm::validate($model);
            }

            if ($model->load(Yii::$app->request->post())) {
                if ($model->hospital_type == Hospital::TYPE_PARENT) {
                    $model->setScenario(Hospital::SCENARIO_CREATE_PARENT_HOSPITAL);
                }
                if ($model->validate() && $model->save()) {

                    $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                    $model->galleryFiles = \yii\web\UploadedFile::getInstances($model, 'galleryFiles');

                    $model->uploadGallery();
                    $model->uploadLogo();

                    $schedule = Yii::$app->request->post("Hospital")['schedule'];

                    if (count($schedule)) {
                        $model->unlinkAll('schedules', true);
                        foreach ($schedule['day'] as $i => $days) {
                            $scheduleModel = new \common\models\HospitalShedule();
                            $scheduleModel->hospital_id = $model->primaryKey;
                            $scheduleModel->day = $days;
                            $scheduleModel->time = $schedule['time'][$i];
                            if ($scheduleModel->validate()) {
                                $scheduleModel->save();
                            }
                        }
                    }

                    return $this->redirect(['create', 'id' => $model->id, 'step' => 'location']);

                }
            }

//            return $this->render('create', [
//                'model' => $model,
//            ]);
        } else if (!empty($id) && $step == 'location') {
            $model = $this->findModel($id);
            
        }

        return $this->render('create', [
            'model' => $model,
            'step' => $step,
        ]);
    }

    /**
     * Updates an existing Hospital model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->hospital_type = Hospital::TYPE_ALONE;
        if(!$model->parent_id) {
            $model->hospital_type = Hospital::TYPE_PARENT;
        }

        if (\Yii::$app->request->isAjax) {
            $model->load(Yii::$app->request->post());
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->hospital_type == Hospital::TYPE_PARENT) {
                $model->setScenario(Hospital::SCENARIO_CREATE_PARENT_HOSPITAL);
            }

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->hospital_type == Hospital::TYPE_PARENT) {
                $model->setScenario(Hospital::SCENARIO_CREATE_PARENT_HOSPITAL);
            }

            if($model->validate() && $model->save()) {
                $model->file = \yii\web\UploadedFile::getInstance($model, 'file');
                $model->galleryFiles = \yii\web\UploadedFile::getInstances($model, 'galleryFiles');
                
                $model->uploadGallery();
                $model->uploadLogo();
                
                $schedule = Yii::$app->request->post("Hospital")['schedule'];

                if (count($schedule)) {
                    $model->unlinkAll('schedules', true);
                    foreach ($schedule['day'] as $i => $days) {
                        $scheduleModel = new \common\models\HospitalShedule();
                        $scheduleModel->hospital_id = $model->primaryKey;
                        $scheduleModel->day = $days;
                        $scheduleModel->time = $schedule['time'][$i];
                        if ($scheduleModel->validate()) {
                            $scheduleModel->save();
                        }
                    }
                }
                
                return $this->redirect(['update', 'id' => $model->id]);
                
            }
        }
        //echo "<pre>"; print_r($model->getErrors()); exit;
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Ajax post delete shedule record for hospital
     * @return responce
     */
    public function actionDeleteSchedule() {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $scheduleId = $request->post('scheduleId');
            $model = \common\models\HospitalShedule::findOne($scheduleId);
            if($model) {
                $model->delete();
                echo \yii\helpers\Json::encode([                    
                    'success' => true,
                ]);
                Yii::$app->end();
            }
        }
    }

    /**
     * Deletes an existing Hospital model.
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
     * Finds the Hospital model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hospital the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hospital::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteImage() {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $hospitalId = $request->post('hospitalId');
            $model = $this->findModel($hospitalId);
            $model->logo = null;
            if($model->save(false)) {
                @unlink(Yii::getAlias('@frontend') . '/web/uploads/hospitals/' . $model->primaryKey . '/logo.jpg');
                echo \yii\helpers\Json::encode([
                    'success' => true,
                ]);
                Yii::$app->end();
            }
        }
    }
}
