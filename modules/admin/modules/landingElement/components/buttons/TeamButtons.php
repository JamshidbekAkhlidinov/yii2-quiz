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
use yii\web\NotFoundHttpException;

class TeamButtons
{
    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('fa-plus', ['icon' => 'fa']),
            ],
            'url' => ['team/create'],
            'footer' => '',
            'header' => "<h2>" . translate("Team Form") . "</h2>"
        ]);
    }

    public static function update(LandingElement $model)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'icon' => icon('ri-pencil-line', ['icon' => 'ri-pencil']),
                'label' => 'Edit',
                'options' => [
                    'style' => [
                        'cursor' => 'pointer' 
                    ]
                ]
            ],
            'url' => ['team/update', 'id' => $model->id],
            'footer' => '',
            'header' => "<h2>" . translate("Team Update Form") . "</h2>"
        ]);
    }


}