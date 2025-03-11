<?php
/*
 *   Jamshidbek Akhlidinov
 *   21 - 11 2023 15:6:25
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = "@vendor/ustadev/velzon-template/src/assets";

    public $css = [
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
        'libs/feather-icons/feather.min.js',
        'js/pages/plugins/lord-icon-2.1.0.js',
        'libs/choices.js/public/assets/scripts/choices.min.js',//for post category
        'libs/simplebar/simplebar.min.js', //for profile settings
        'js/pages/profile-setting.init.js', //for profile settings
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        \rmrevin\yii\fontawesome\AssetBundle::class
    ];
}