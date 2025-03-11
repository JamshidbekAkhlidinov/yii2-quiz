<?php

namespace app\modules\admin\modules\rbac\components\buttons;

use app\modules\admin\widgets\modal\ModalWidget;

class AuthAssignmentButtons
{
    public static function create()
    {
        return ModalWidget::widget([
           'button' => [
               'tag' => 'button',
               'class' => 'btn btn-success',
               'label' => icon('fa-plus', ['icon' => 'fa']),
           ],
           'header' => "<h2>" . translate("Auth Assignment Form") . "</h2>",
           'url' => ['auth-assignment/create'],
           'footer' => ''

        ]);
    }

    public static function update($item_name, $user_id)
    {
        return ModalWidget::widget([
           'button' => [
               'tag' => 'span',
               'class' => '',
               'label' => $item_name,
               'options' => [
                   'style' => [
                       'cursor' => 'pointer'
                   ]
               ]
           ],
           'url' => ['auth-assignment/update',
               'item_name' => $item_name,
               'user_id' => $user_id
               ],
           'footer' => '',
           'header' => "<h2>" . translate("Auth Assignment Update Form") . "</h2>"
        ]);
    }
}