<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 22:37:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\components\buttons;

use app\modules\admin\modules\landingElement\models\LandingElement;
use app\modules\admin\widgets\modal\ModalWidget;

class QuestionButtons
{
    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('fa-plus', ['icon' => 'fa']),
            ],
            'url' => ['question/create'],
            'footer' => '',
            'header' => "<h2>" . translate("Question Form") . "</h2>"
        ]);
    }

    public static function update(LandingElement $model)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'label' => $model->title,
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['question/update', 'id' => $model->id],
            'footer' => '',
            'header' => "<h2>" . translate("Question Update Form") . "</h2>"
        ]);
    }


}