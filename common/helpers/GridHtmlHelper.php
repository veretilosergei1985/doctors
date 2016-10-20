<?php

namespace common\helpers;

use yii\helpers\Html;

class GridHtmlHelper
{
    public function displayRowAsList($data, $field) {

        $html = '';
        $html.= Html::beginTag('ul');
        foreach ($data as $item) {
            $html.= Html::beginTag('li');
            $html.= $item->$field;
            $html.= Html::endTag('li');
        }
        $html.= Html::endTag('ul');
        return $html;
    }
}