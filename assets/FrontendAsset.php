<?php

namespace app\assets;

class FrontendAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@vendor/ustadev/velzon-template/src/assets";

    public $css = [
        'libs/swiper/swiper-bundle.min.css',
        'css/bootstrap.min.css',
        'css/icons.min.css',
        'css/app.min.css',
        'css/custom.min.css',
    ];
    public $js = [
        'js/layout.js',
        'libs/bootstrap/js/bootstrap.bundle.min.js',
        'libs/simplebar/simplebar.min.js',
        'libs/node-waves/waves.min.js',
        "libs/feather-icons/feather.min.js",
        "js/pages/plugins/lord-icon-2.1.0.js",
        //"js/plugins.js",
        "libs/swiper/swiper-bundle.min.js",
        "js/pages/landing.init.js",
        "libs/particles.js/particles.js",
        "js/pages/particles.app.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}