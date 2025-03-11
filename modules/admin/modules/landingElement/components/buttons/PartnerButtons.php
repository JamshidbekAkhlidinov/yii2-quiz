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
use yii\bootstrap5\Html;

class PartnerButtons
{

    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('fa-plus', ['icon' => 'fa']),
            ],
            'url' => ['partner/create'],
            'footer' => '',
            'header' => "<h2>" . translate("Partner Form") . "</h2>"
        ]);
    }

    public static function update(LandingElement $modal)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'label' => Html::img(
                    $modal->files,
                    [
                        'width' => '150px'
                    ],
                ),
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['partner/update', 'id' => $modal->id],
            'footer' => '',
            'header' => "<h2>" . translate("Partner Update Form") . "</h2>"
        ]);
    }


}