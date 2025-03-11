<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 6 2024 16:45:7
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\buttons;

use app\modules\admin\models\Test;
use app\modules\admin\widgets\modal\ModalWidget;
use yii\helpers\Html;
use yii\helpers\Url;

class TestButton
{

    public static function uploadFile()
    {
        return Html::a(
            translate("upload file"),
            ['upload-file/doc'],
            ['class' => 'btn btn-success']
        );
    }

    public static function create()
    {
        return ModalWidget::widget([
            'url' => Url::to(['test/create']),
            'footer' => '',
            'header' => "<h2>" . translate("Test form") . "</h2>",
            'button' => [
                'tag' => 'a',
                'label' => icon('fa-plus', ['icon' => 'fa']),
                'class' => 'btn btn-primary'
            ],
        ]);
    }

    public static function update(Test $model)
    {
        return ModalWidget::widget([
            'url' => Url::to(['test/update', 'id' => $model->id]),
            'footer' => '',
            'button' => [
                'tag' => 'a',
                'label' => $model->name,
            ],
            'header' => "<h2>" . translate("Test form") . "</h2>"
        ]);
    }
}