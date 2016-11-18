<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrawlerController
 *
 * @author sveretilo
 */

namespace console\controllers;

use common\models\City;
use yii\console\Controller;

use console\helpers;

class CrawlerController extends Controller {
    public function actionGetStations($city, $url)
    {
        $curl = new helpers\Curl($url.$city.'/all');
        $content = $curl->GET();

        if (!empty($content)) {
            preg_match_all('/<label class="pill with-icon\s?(icon-left)?\s?color-(.*?)"data-value=\"(.*?)\"style=left:(.*?)px;top:(.*?)px><input type=checkbox><span><span>(.*?)<\/span><\/span><\/label>/s', $content, $matches);

            //echo "<pre>"; print_r($matches); exit;

            $cityModel = City::find()->where(['code' => $city])->one();

            if ($matches && $cityModel) {
                $stations = [];
                unset($matches[0]);
                unset($matches[1]);
                foreach ($matches[6] as $i => $stationName) {
                    $stations[$i]['name'] = $stationName;
                }
                
                foreach ($matches[3] as $i => $stationName) {
                    $stations[$i]['code'] = $stationName;
                }
                
                foreach ($matches[4] as $i => $position) {
                    $stations[$i]['left'] = $position;
                }
                
                foreach ($matches[5] as $i => $position) {
                    $stations[$i]['top'] = $position;
                }
                
                foreach ($matches[2] as $i => $color) {
                    $stations[$i]['color'] = $color;
                }

                //echo "<pre>"; print_r($stations); exit;

                foreach ($stations as $station) {
                    $stationModel = new \common\models\MetroStation();
                    $stationModelSearch = clone $stationModel;

                    $result = $stationModelSearch->find()->where(['like', 'title', $station['name']])->one();
                    if ($result == null) {
                        $stationModel->city_id = $cityModel->primaryKey;
                        $stationModel->title = $station['name'];
                        $stationModel->left = $station['left'];
                        $stationModel->top = $station['top'];
                        $stationModel->color = $station['color'];
                        $stationModel->status = 1;

                        if ($stationModel->save()) {
                            echo $stationModel->primaryKey . " saved\n";
                        } else {
                            throw new \yii\console\Exception('Save station model error');
                        }
                    }
                }
            }
        }
        
    }
}
