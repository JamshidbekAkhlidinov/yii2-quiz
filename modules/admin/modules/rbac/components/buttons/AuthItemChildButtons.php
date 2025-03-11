<?php

namespace app\modules\admin\modules\rbac\components\buttons;

use app\modules\admin\modules\rbac\models\AuthItemChild;
use app\modules\admin\widgets\modal\ModalWidget;

class AuthItemChildButtons
{
    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => "button",
                'class' => "btn btn-success",
                'label' => icon('fa-plus', ['icon' => 'fa']),
            ],
            'url' => ['auth-item-child/create', 'parent' => get('parent')],
            'footer' => '',
            'header' => "<h2>" . translate('Auth Item Child Form') . "</h2>"
        ]);
    }

    public static function update(AuthItemChild $model, $label)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'label' => $label,
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['auth-item-child/update', 'parent' => $model->parent, 'child' => $model->child],
            'footer' => '',
            'header' => "<h2>" . translate("Auth Item Child Update Form") . "</h2>"
        ]);
    }
}