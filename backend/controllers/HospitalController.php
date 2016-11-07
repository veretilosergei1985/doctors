<?php

namespace backend\controllers;

use Yii;
use common\models\Hospital;
use backend\models\HospitalSearch;
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
    public function actionCreate()
    {
        $model = new Hospital();
        
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate() && $model->save()) {
                $model->galleryFiles = \yii\web\UploadedFile::getInstances($model, 'galleryFiles');
                if ($model->uploadGallery()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }   
            }
        } 
        return $this->render('create', [
            'model' => $model,
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

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate() && $model->save()) {
                $model->galleryFiles = \yii\web\UploadedFile::getInstances($model, 'galleryFiles');
                if ($model->uploadGallery()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDeleteImage() {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $request = Yii::$app->request;
            $doctorId = $request->post('doctorId');
            $model = $this->findModel($doctorId);
            $model->image = null;
            if($model->save(false)) {
                @unlink(Yii::getAlias('@frontend') . '/web/uploads/doctors/' . $model->primaryKey . '/image.jpg');
                echo Json::encode([
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
}
