<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 22:37:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\content\components\buttons;

use app\modules\admin\widgets\modal\ModalWidget;

class PostCategoryButtons
{

    public static function create()
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => icon('fa-plus',['icon'=>'fa']),
            ],
            'url' => ['post-category/create'],
            'footer' => '',
            'header' => "<h2>" . translate("Post Category Form") . "</h2>"
        ]);
    }

    public static function update($id, $text)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'label' => $text,
                'options' => [
                    'style' => [
                        'cursor' => 'pointer'
                    ]
                ]
            ],
            'url' => ['post-category/update', 'id' => $id],
            'footer' => '',
            'header' => "<h2>" . translate("Post Category Update Form") . "</h2>"
        ]);
    }


}