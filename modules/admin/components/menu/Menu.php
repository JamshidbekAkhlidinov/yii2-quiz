<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 18:26:26
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\components\menu;

use app\modules\admin\enums\AuthItemTypeEnum;
use app\modules\admin\enums\UserRolesEnum;
use app\modules\admin\widgets\MenuWidget;

class Menu
{
    public static function getMenu()
    {
        return MenuWidget::widget([
            'items' => [
                [
                    'label' => 'Main Menus',
                    'type' => MenuWidget::type_title, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                ],
                [
                    'label' => translate("Users"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-users',
                    'url' => ['/admin/user'],
                    'active' => controller()->id == 'user',
                    'visible' => can(UserRolesEnum::ROLE_ADMINISTRATOR)
                ],
                [
                    'label' => translate("Subjects"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-header',
                    'url' => ['/admin/subject'],
                    'active' => controller()->id == 'subject',
                ],
                [
                    'label' => translate("Tests"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-list',
                    'url' => ['/admin/test'],
                    'active' => in_array(controller()->id, ['test', 'question']),
                ],
                [
                    'label' => translate("Selected Tests"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-outdent',
                    'url' => ['/admin/selected-test'],
                    'active' => controller()->id == 'selected-test',
                ],

                [
                    'label' => translate("Test Results"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-newspaper-o',
                    'url' => ['/admin/user-test'],
                    'active' => controller()->id == 'user-test',
                ],
                /*

                [
                    'label' => translate("Cards Data"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-database',
                    'url' => ['/admin/card-data'],
                    'active' => controller()->id == 'card-data',
                ],
                [
                    'label' => translate("Cards"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-credit-card',
                    'url' => ['/admin/card'],
                    'active' => controller()->id == 'card',
                ],
                [
                    'label' => translate("Test Results"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-newspaper-o',
                    'url' => ['/admin/user-test'],
                    'active' => controller()->id == 'user-test',
                ],
                [
                    'label' => translate("Subject"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-users',
                    'url' => ['/admin/subject'],
                    'active' => controller()->id == 'user',
                ],

                [
                    'label' => translate("Content"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                    'id' => 'test2',
                    'active' => module()->id == "content",
                    'items' => [
                        [
                            'label' => translate('Pages'),
                            'url' => ['/admin/content/page'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "page",

                        ],
                        [
                            'label' => translate('Categories'),
                            'url' => ['/admin/content/post-category'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "post-category",

                        ],
                        [
                            'label' => translate("Tags"),
                            'url' => ['/admin/content/post-tag'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "post-tag",

                        ],
                        [
                            'label' => translate("Posts"),
                            'url' => ['/admin/content/post'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == "post",

                        ],
                    ],
                ],
                LandingElementMenu::getMenu(),
                [
                    'label' => translate("File manager"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'las la-folder-open',
                    'url' => ['/admin/file'],
                    'active' => module()->id == 'file',
                    'visible' => can(UserRolesEnum::ROLE_ADMINISTRATOR)
                ],
                [
                    'label' => 'Telegram bot module',
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'ri-dashboard-2-line',
                    'id' => 'telegram_bot',
                    'active' => module()->id == 'telegram',
                    'items' => [
                        [
                            'label' => translate("Companies"),
                            'url' => ['/admin/telegram/telegram-company'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == 'telegram-company',
                        ],
                        [
                            'label' => translate("Bot users"),
                            'url' => ['/admin/telegram/telegram-bot-user'],
                            'icon' => 'ri-dashboard-2-line',
                            'active' => controller()->id == 'telegram-bot-user',
                        ],
                    ],
                ],
                [
                    'label' => translate("I18n Messages"),
                    'type' => MenuWidget::type_item, //menu,item
                    'icon' => 'fa fa-globe',
                    'url' => ['/admin/translation-message'],
                    'active' => controller()->id == 'translation-message',
                    'visible' => can(UserRolesEnum::ROLE_ADMINISTRATOR)
                ],
                self::getRbacMenu(),
                */
            ]
        ]);
    }

    public static function getRbacMenu()
    {
        $controller_id = controller()->id;
        $module_id = module()->id;
        return [
            'label' => translate("Rbac configuration"),
            'icon' => 'ri-dashboard-2-line',
            'visible' => can(UserRolesEnum::ROLE_ADMINISTRATOR),
            'active' => $module_id == 'rbac',
            'id' => 'rbac',
            'type' => MenuWidget::type_item,
            'items' => [
                [
                    'label' => translate("Roles"),
                    'url' => ['/admin/rbac/auth-item', 'type' => AuthItemTypeEnum::ROLE],
                    'active' => $controller_id == 'auth-item' && get('type') == AuthItemTypeEnum::ROLE,
                ],
                [
                    'label' => translate("Permissions"),
                    'url' => ['/admin/rbac/auth-item', 'type' => AuthItemTypeEnum::PERMISSION],
                    'active' => $controller_id == 'auth-item' && get('type') == AuthItemTypeEnum::PERMISSION,
                ],
                [
                    'label' => translate("Items childs"),
                    'url' => ['/admin/rbac/auth-item-child'],
                    'active' => $controller_id == 'auth-item-child',
                ],
                /*
                [
                    'label' => translate("Assignments"),
                    'url' => ['/admin/rbac/auth-assignment'],
                    'active' => $controller_id == 'auth-assignment',
                ],
                */
            ]
        ];
    }

}