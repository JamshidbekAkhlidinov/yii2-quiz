<?php

namespace app\modules\admin\modules\landingElement\widgets;

use app\modules\admin\enums\PositionMenuEnum;
use yii\base\Widget;
use yii\helpers\Html;

class MenuGroupButtonWidget extends Widget
{
    public $items = [
        PositionMenuEnum::ALL,
        PositionMenuEnum::HEADER,
        PositionMenuEnum::FOOTER_EXPLORE,
    ];

    public function createButton($item)
    {
        return Html::a(
            PositionMenuEnum::LABELS[$item],
            ['index', 'position_menu' => $item],
            [
                'style' => 'color: white; background-color: ' . PositionMenuEnum::BG_COLORS[$item],
                'class' => 'btn',
            ]
        );
    }

    public function buttonList()
    {
        $items = $this->items;
        $itemsMenu = [];
        foreach ($items as $item) {
            $itemsMenu[] = $this->createButton($item);
        }
        return implode(" ", $itemsMenu);
    }


    public function run()
    {
        return $this->buttonList();
    }

}