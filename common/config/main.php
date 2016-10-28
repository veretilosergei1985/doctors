<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    //'language' => 'ru-RU',
    //'sourceLanguage' => 'en-US',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'i18n' => [
//            'translations' => [
//                'app*' => [
//                    'class' => 'yii\i18n\PhpMessageSource',
//                    //'basePath' => '@app/messages',
//                    //'sourceLanguage' => 'en-US',
//                    'fileMap' => [
//                        'app' => 'app.php',
//                        'app/error' => 'error.php',
//                    ],
//                ],
//            ],
//        ],
    ],
];
