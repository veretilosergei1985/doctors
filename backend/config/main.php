<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'thumbnail' => [
            'class' => 'sadovojav\image\Thumbnail',
        ],
        'request'   => [
            'cookieValidationKey'   => 'dsfsydf78sd8fhw8yfdbw8y',
            'enableCsrfValidation' => true,
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app/backend' => 'backend.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'thumbnail' => [
            'class' => 'sadovojav\image\Thumbnail',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [
//                '/' => 'doctors/index',
//                'site/logout' => 'site/logout',
//                'site/login' => 'site/login',
                'doctors' => 'doctor/index',
                'doctor/info/<id:\d+>' => 'doctor/info',
                'district/get-all' => 'district/get-all',
                'doctor/delete-image' => 'doctor/delete-image',
                'hospitals' => 'hospital/index',
                'hospital/delete-schedule' => 'hospital/delete-schedule',
                'hospital-gallery/delete-image' => 'hospital-gallery/delete-image',
                'stations' => 'metro-station/index',
                'cities' => 'city/index',
            ],
        ],
    ],
    'params' => $params,
];
