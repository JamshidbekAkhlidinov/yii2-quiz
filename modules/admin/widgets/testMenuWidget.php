<?php
/*
 *   Jamshidbek Akhlidinov
 *   21 - 11 2023 18:48:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class testMenuWidget extends Widget
{

    public $items = [
        [
            'name' => "Home title",
            'isTitle' => true,
        ],
        [
            'name' => "Home 2 one",
            'icon' => "ri-dashboard-2-line",
            'isTitle' => false,
            'url' => ['default/index'],
            'badge' => 'new',
            'badgeClass' => 'bg-success',
        ],
        [
            'name' => "Home 3  items",
            'icon' => "ri-dashboard-2-line",
            'isTitle' => false,
            'url' => ['default/index'],
            'items' => [
                [
                    'name' => "Home 4 item",
                    'icon' => "fas fa-home",
                    'url' => ['default/index'],
                ],
                [
                    'name' => "Home 4 item",
                    'icon' => "fas fa-home",
                    'url' => ['default/index'],
                ],
                [
                    'name' => "Home 4 item",
                    'icon' => "fas fa-home",
                    'url' => ['default/index'],
                ],
                [
                    'name' => "Home 4 item",
                    'icon' => "fas fa-home",
                    'url' => ['default/index'],
                ],
                [
                    'name' => "Home 4 item",
                    'icon' => "fas fa-home",
                    'url' => ['default/index'],
                ],
                [
                    'name' => "Home 4 item",
                    'icon' => "fas fa-home",
                    'url' => ['default/index'],
                ]

            ]
        ]
    ];

    public function initMenuTitle($item)
    {
        $name = $item['name'] ?? '';
        return Html::tag(
            'li',
            Html::tag(
                'span',
                $name,
                [
                    'data-key' => "t-" . strtolower($name),
                ]
            ),
            [
                'class' => 'menu-title',
            ]
        );
    }

    public function initNavItem($item, $options = null)
    {
        $name = $item['name'] ?? '';
        $url = $item['url'] ?? '';
        $icon = $item['icon'] ?? "";
        $badge = "";
        if (isset($item['badge'])) {
            $badge = Html::tag(
                'span',
                $item['badge'],
                [
                    'class' => [
                        'badge badge-pill',
                        $item['badgeClass'] ?? 'bg-success'
                    ],
                ]
            );
        }
        $optionData = [];
        $url = "";
        if ($options) {
            $url = "id_" . str_replace(' ', '', $item['name'] ?? '');
            $url = strtolower($url);
            $optionData = [
                "data-bs-toggle" => "collapse",
                "role" => "button",
                "aria-expanded" => "false",
                "aria-controls" => $url
            ];
            $url = "#" . $url;
        }
        return Html::tag(
            'li',
            Html::a(
                Html::tag(
                    'i',
                    '',
                    [
                        'class' => $icon,
                    ]
                ) . Html::tag(
                    'span',
                    $name,
                    [
                        'data-key' => "t-" . str_replace(' ', '', strtolower($name)),
                    ]
                ) . $badge,
                $url,
                array_merge(
                    ['class' => "nav-link menu-link collapsed jktest"],
                    $optionData,
                )
            ) . $options,
            [
                'class' => 'nav-item',
            ]
        );
    }


    public function initMenuDropDown($item)
    {
        $itemsMenu = [];
        foreach ($item['items'] as $item2) {
            $name = $item2['name'] ?? '';
            $url = $item2['url'] ?? '';

            $itemsMenu[] = Html::tag(
                'li',
                Html::a(
                    $name,
                    $url,
                    [
                        'class' => 'nav-link',
                        'data-key' => 't-' . str_replace(' ', '', strtolower($name)),
                    ]
                ),
                [
                    'class' => 'nav-item'
                ]
            );
        }
        return $this->initNavItem(
            $item,
            Html::tag(
                'dev',
                Html::tag(
                    'ul',
                    implode('', $itemsMenu),
                    [
                        'class' => 'nav nav-sm flex-column',
                    ]
                ),
                [
                    'class' => "collapse menu-dropdown",
                    'id' => strtolower('id_' . str_replace(' ', '', $item['name'] ?? '')),
                ]
            )
        );
    }


    public function initItem()
    {
        $items = [];
        foreach ($this->items as $item) {
            if (isset($item['isTitle']) && $item['isTitle']) {
                $items[] = $this->initMenuTitle($item);
            } elseif (isset($item['items']) && is_array($item['items'])) {
                $items[] = $this->initMenuDropDown($item);
            } else {
                $items[] = $this->initNavItem($item);
            }
        }
        return implode('', $items);
    }


    public function run()
    {
        return Html::tag(
            'ul',
            $this->initItem(),
            [
                'id' => 'navbar-nav',
                'class' => 'navbar-nav',
            ]
        );
    }
}