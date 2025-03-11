<?php
/*
 *   Jamshidbek Akhlidinov
 *   22 - 11 2023 19:56:43
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class MenuWidget extends Widget
{
    const type_title = 'title';
    const type_item = 'item';

    public string $controller_id;

    public function __construct($config = [])
    {
        $this->controller_id = \Yii::$app->controller->id;
        parent::__construct($config);
    }

    public array $items = [
        [
            'label' => 'Test Title',
            'type' => self::type_title, //menu,item
            'icon' => 'ri-dashboard-2-line',
        ],
        [
            'label' => 'Main Manu',
            'type' => self::type_item, //menu,item
            'icon' => 'ri-dashboard-2-line',
            'url' => ['/admin/default/index'],
            'active' => false,
        ],
        [
            'label' => 'Main menu child',
            'type' => self::type_item, //menu,item
            'icon' => 'ri-dashboard-2-line',
            'id' => 'test',
            'active' => true,
            'items' => [
                [
                    'label' => 'Login',
                    'url' => ['/admin/default/index'],
                    'icon' => 'ri-dashboard-2-line',
                    'active' => true,
                ],
                [
                    'label' => 'child menu',
                    'url' => ['/admin/default/index'],
                    'icon' => 'ri-dashboard-2-line',
                ],
            ],
        ],
    ];

    public function checkType()
    {
        $menus = [];
        foreach ($this->items as $menu) {
            if ($menu['type'] == self::type_title) {
                if ((isset($menu['visible']) && $menu['visible']) || !isset($menu['visible'])) {
                    $menus[] = $this->initTitle($menu);
                }
            } else {
                if ((isset($menu['visible']) && $menu['visible']) || !isset($menu['visible'])) {
                    $menus[] = $this->initMainMenu($menu);
                }
            }
        }
        return implode('', $menus);
    }

    public function initTitle($item)
    {
        $url = $item['url'] ?? '';
        return Html::tag(
            'li',
            Html::tag(
                'span',
                $item['label'] ?? '',
                [
                    'data-key' => 't-' . $url
                ]
            ),
            [
                'class' => 'menu-title',
            ]
        );
    }

    public function initMainMenu($item)
    {
        $active = '';
        if ($item['active'] ?? false) {
            $active = 'active';
        }
        $options = [
            'class' => 'nav-link menu-link ' . $active,
        ];
        $url = $item['url'] ?? '';

        $children = "";
        if (isset($item['items']) && is_array($item['items'])) {
            $options = array_merge($options, [
                'data-key' => 't-' . strtolower($item['label'] ?? ''),
                'data-bs-toggle' => 'collapse',
                'role' => 'button',
                'aria-expanded' => false,
                'aria-controls' => $item['id'] ?? 'dashboard',
            ]);
            $children = $this->initMainItem($item);
            $url = "#" . $item['id'] ?? 'dashboard';
        }
        $icon = $item['icon'] ?? '';
        return Html::tag(
            'li',
            Html::a(
                Html::tag(
                    'i',
                    '',
                    [
                        'class' => $icon
                    ]
                ) .
                Html::tag('span', $item['label'] ?? '', ['data-key' => 't-' . strtolower($item['label'] ?? '')]),
                $url,
                $options,
            ) . "\n" . $children,
            [
                'class' => 'nav-item',
            ]
        );
    }

    public function initMainItem($items)
    {
        $active = '';
        if ($items['active'] ?? 'false') {
            $active = 'show';
        }
        return Html::tag(
            'div',
            Html::tag(
                'ul',
                $this->initItem($items['items']),
                [
                    'class' => 'nav nav-sm flex-column ',
                ]
            ),
            [
                'class' => 'collapse menu-dropdown ' . $active,
                'id' => $items['id'] ?? 'dashboard',
            ]
        );
    }

    public function initItem($items)
    {
        $arrayItems = [];
        foreach ($items as $item) {
            $active = '';
            if ($item['active'] ?? false) {
                $active = 'active';
            }
            $arrayItems[] = Html::tag(
                'li',
                Html::a(
                    $item['label'] ?? '',
                    $item['url'] ?? '',
                    [
                        'class' => 'nav-link ' . $active,
                        'data-key' => 't-' . strtolower($item['label'] ?? ''),
                    ]
                ),
                [
                    'class' => 'nav-item',
                ]
            );
        }
        return implode("\n", $arrayItems);
    }


    public function run()
    {
        return Html::tag(
            'ul',
            $this->checkType(),
            [
                'class' => 'navbar-nav',
                'id' => 'navbar-nav',
            ]
        );
    }
}