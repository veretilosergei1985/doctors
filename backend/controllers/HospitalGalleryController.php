<?php

namespace backend\controllers;
use yii\filters\AccessControl;

class HospitalGalleryController extends \yii\web\Controller
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
                        'actions' => ['delete-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionDeleteImage() {
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            $request = \Yii::$app->request;
            $imageId = $request->post('imageId');
            $galleryModel = $this->findModel($imageId);
            
            if ($galleryModel !== null) {
                @unlink(\Yii::getAlias('@frontend') . '/web/uploads/hospitals/' . $galleryModel->hospital_id . '/gallery/' . $galleryModel->image);
                $galleryModel->delete();                        
                echo \yii\helpers\Json::encode([
                    'success' => true,
                ]);
                \Yii::$app->end();
            }    
        }
    }
    
    protected function findModel($id)
    {
        if (($model = \common\models\HospitalGalerry::findOne($id)) !== null) {
            return $model;
        } else {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
    }
}
