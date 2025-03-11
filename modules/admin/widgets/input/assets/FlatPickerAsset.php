<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 2:59:6
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\input\assets;

class FlatPickerAsset extends \yii\web\AssetBundle
{
    public $sourcePath = "@vendor/ustadev/velzon-template/src/assets/libs";

    public $css = [
        'flatpickr/flatpickr.min.css'
    ];
    public $js = [
        'flatpickr/flatpickr.min.js'
    ];
    public $depends = [
    ];
}