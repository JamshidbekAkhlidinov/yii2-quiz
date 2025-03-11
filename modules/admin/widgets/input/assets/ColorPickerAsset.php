<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 2:59:6
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\input\assets;

class ColorPickerAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@vendor/ustadev/velzon-template/src/assets/libs/@simonwep/pickr";

    public $baseUrl = "jk.uz";

    public $css = [
        "themes/classic.min.css",
        "themes/monolith.min.css",
        "themes/nano.min.css",
    ];
    public $js = [

    ];
    public $depends = [
    ];
}