<?php

namespace app\modules\admin\modules\rbac\components\buttons;

use app\modules\admin\widgets\modal\ModalWidget;

class AuthItemButtons
{
    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('fa-plus', ['icon' => 'fa']),
            ],
            'header' => "<h2>" . translate("Auth Item Form") . "</h2>",
            'url' => ['auth-item/create'],
            'footer' => '',
        ]);
    }

    public static function update($text)
    {
        return ModalWidget::widget([
            "button" => [
                "tag" => "span",
                'class' => '',
                'label' => $text,
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['auth-item/update', 'name' => $text],
            'footer' => '',
            'header' => "<h2>" . translate("Auth Item Update Form") . "</h2>"
        ]);
    }
}