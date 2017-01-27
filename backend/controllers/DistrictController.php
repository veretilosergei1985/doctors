<?php

namespace backend\controllers;
use backend\models\DistrictSearch;
use common\models\District;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

class DistrictController extends \yii\web\Controller
{
    public function actionIndex($city_id = '')
    {
        $searchModel = new DistrictSearch();
        if (!empty($city_id)) {
            $searchModel->city_id = $city_id;

        }
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new District model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new District();

        if ($model->load(\Yii::$app->request->post())) {
            if($model->validate() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing District model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post())) {
            if($model->validate() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $city_id
     * @return mixed
     */
    public function actionGetAll($city_id) {
        if (\Yii::$app->request->isAjax) {
            $model = District::find()->all();
            if($city_id) {
                $model = District::find()->where(['city_id' => $city_id])->all();
            }
            echo Json::encode([
                'success' => true,
                'data' => $model,
            ]);
            \Yii::$app->end();
        }
    }

    /**
     * Finds the District model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return District the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = \common\models\District::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
