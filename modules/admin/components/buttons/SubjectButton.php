<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 6 2024 16:22:5
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\buttons;

use app\modules\admin\models\Subject;
use app\modules\admin\widgets\modal\ModalWidget;
use yii\helpers\Url;

class SubjectButton
{
    public static function create()
    {
        return ModalWidget::widget([
            'url' => Url::to(['subject/create']),
            'footer' => '',
            'header' => "<h2>" . translate("Subject form") . "</h2>",
            'button' => [
                'tag' => 'a',
                'label' => icon('fa-plus', ['icon' => 'fa']),
                'class' => 'btn btn-primary'
            ],
        ]);
    }

    public static function update(Subject $model)
    {
        return ModalWidget::widget([
            'url' => Url::to(['subject/update', 'id' => $model->id]),
            'footer' => '',
            'button' => [
                'tag' => 'a',
                'label' => $model->name,
            ],
            'header' => "<h2>" . translate("Subject form") . "</h2>"
        ]);
    }
}