<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'js/plugins/tree-multiselect/jquery.tree-multiselect.scss'
    ];
    public $js = [
        //'https://maps.googleapis.com/maps/api/js?key=AIzaSyDM_yPrIq30kCIxSUiv--sU-mmAuXVLU1s&libraries=places',
        'js/doctor-backend.js',
        'js/plugins/tree-multiselect/jquery.tree-multiselect.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
