<?php

namespace backend\controllers;
use backend\models\DistrictSearch;
use common\models\District;
use yii\data\ActiveDataProvider;

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

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
