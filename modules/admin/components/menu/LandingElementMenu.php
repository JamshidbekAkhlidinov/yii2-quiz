<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:37:31
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\menu;

use app\modules\admin\widgets\MenuWidget;

class LandingElementMenu
{
    public static function getMenu()
    {
        return [
            'label' => translate("Landing Elements"),
            'type' => MenuWidget::type_item, //menu,item
            'icon' => 'ri-dashboard-2-line',
            'id' => 'landingElement',
            'active' => module()->id == "landingElement",
            'items' => [
                [
                    'label' => translate("Menu"),
                    'url' => ['/admin/landingElement/menu'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "menu",

                ],
                [
                    'label' => translate("Site Config"),
                    'url' => ['/admin/landingElement/header/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "header",

                ],
                [
                    'label' => translate("Header Title"),
                    'url' => ['/admin/landingElement/header-title/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "header-title",

                ],
                [
                    'label' => translate("Product"),
                    'url' => ['/admin/landingElement/product'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "product",
                ],
                [
                    'label' => translate("Services"),
                    'url' => ['/admin/landingElement/service'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "service",
                ],
                [
                    'label' => translate("Partners"),
                    'url' => ['/admin/landingElement/partner'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "partner",
                ],
                [
                    'label' => translate("Process"),
                    'url' => ['/admin/landingElement/process/index'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "process",
                ],
                [
                    'label' => translate("Team"),
                    'url' => ['/admin/landingElement/team/index'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "team",
                ],
                [
                    'label' => translate("Opinions"),
                    'url' => ['/admin/landingElement/opinion'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "opinion",
                ],
                [
                    'label' => translate("Project"),
                    'url' => ['/admin/landingElement/project/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "project",
                ],
                [
                    'label' => translate("Statistic"),
                    'url' => ['/admin/landingElement/statistic/index'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "statistic",
                ],
                [
                    'label' => translate("Question"),
                    'url' => ['/admin/landingElement/question/index'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "question",
                ],
                [
                    'label' => translate("Contact"),
                    'url' => ['/admin/landingElement/contact/form'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => controller()->id == "contact",
                ],
            ],
        ];
    }
}