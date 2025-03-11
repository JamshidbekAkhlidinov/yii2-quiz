<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 6 2024 16:22:5
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\user\components\buttons;

use app\modules\admin\models\UserTest;
use app\modules\admin\widgets\modal\ModalWidget;
use yii\helpers\Url;

class CardButtons
{
    public static function create()
    {
        return ModalWidget::widget([
            'url' => Url::to(['default/create-card']),
            'footer' => '',
            'header' => "<h2>" . translate("User card form") . "</h2>",
            'button' => [
                'tag' => 'a',
                'label' => icon('fa-plus', ['icon' => 'fa']),
                'class' => 'btn btn-primary'
            ],
        ]);
    }
}