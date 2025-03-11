<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 17:10:17
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;

return [
    'bundles' => [
        BootstrapAsset::class => [
            'sourcePath' => "@vendor/ustadev/velzon-template/src/assets",
            'baseUrl' => '',
            'css' => [
                'css/bootstrap.min.css'
            ],
        ],
        BootstrapPluginAsset::class => [
            'sourcePath' => "@vendor/ustadev/velzon-template/src/assets",
            'baseUrl' => '',
            'js' => [
                'libs/bootstrap/js/bootstrap.bundle.min.js'
            ],
        ],
    ],
];