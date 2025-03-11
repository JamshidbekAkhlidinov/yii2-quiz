<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 2:59:6
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\slider\assets;

class BaseAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@vendor/ustadev/velzon-template/src/assets";

    public $css = [
        "libs/swiper/swiper-bundle.min.css",
    ];
    public $js = [
        "libs/swiper/swiper-bundle.min.js",
        "js/pages/swiper.init.js",
    ];
    public $depends = [
    ];
}