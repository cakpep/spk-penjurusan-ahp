<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timezone' => 'Asia/Jakarta',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
