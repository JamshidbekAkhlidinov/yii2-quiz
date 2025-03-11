<?php
/*
 *   Jamshidbek Akhlidinov
 *   24 - 12 2023 1:5:28
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets;

use app\modules\admin\enums\LanguageEnum;
use yii\base\Widget;
use yii\helpers\Html;

class LanguageSwitcherWidget extends Widget
{

    public function getLanguages()
    {
        return LanguageEnum::LABELS;
    }

    public function getCurrentLanguage()
    {
        return Html::button(
            Html::img(
                LanguageEnum::ICONS[app()->language] ?? "",
                [
                    'id' => 'header-lang-img-1',
                    'alt' => app()->language,
                    'class' => 'rounded',
                    'height' => '20',
                ]
            ),
            [
                'class' => 'btn btn-icon btn-topbar btn-ghost-secondary rounded-circle',
                'data-bs-toggle' => 'dropdown',
                'aria-haspopup' => "true",
                'aria-expanded' => "false",
            ]
        );
    }

    public function getLanguageItem()
    {
        $items = [];
        foreach ($this->getLanguages() as $key => $language) {
            $items[] = Html::a(
                Html::img(
                    LanguageEnum::ICONS[$key] ?? "",
                    [
                        'alt' => $key,
                        'class' => 'me-2 rounded',
                        'height' => '18',
                    ]
                ) . Html::tag('span', $language, ['class' => 'align-middle']),
                [
                    '/site/set-locale', 'locale' => $key,
                ],
                [
                    'class' => 'dropdown-item notify-item language',
                ]
            );
        }
        return implode("\n", $items);
    }


    public function run()
    {
        return Html::tag(
            'div',
            $this->getCurrentLanguage().
            Html::tag(
                    'div',
                $this->getLanguageItem(),
                [
                        'class'=>'dropdown-menu dropdown-menu-end',
                ]
            ),
            [
                'class' => 'dropdown ms-1 topbar-head-dropdown header-item',
            ]
        );
    }


}