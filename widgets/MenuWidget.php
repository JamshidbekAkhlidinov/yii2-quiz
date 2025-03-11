<?php

namespace app\widgets;

use app\modules\admin\enums\PositionMenuEnum;
use app\modules\admin\enums\StatusEnum;
use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\landingElement\models\Menu;
use yii\helpers\Url;
use kartik\base\Widget;
use yii\helpers\Html;

class MenuWidget extends Widget
{
    public $mindId = 'menu';
    public $optionData = null;

    public function run()
    {
        return Html::tag(
            "ul",
            $this->setMenu() . $this->optionData,
            ['id' => $this->mindId]
        );
    }

    private function getMenu()
    {
        return Menu::find()
            ->andWhere([
                'status' => StatusEnum::ACTIVE,
                'parent_id' => null,
                'position_menu' => [
                    PositionMenuEnum::HEADER,
                    null,
                ],
            ])
            ->orderBy([
                'order' => SORT_ASC,
            ])
            ->all();
    }

    private function setMenu()
    {
        $item = [];
        foreach ($this->getMenu() as $item) {
            $item[] = $this->setItem($item);
        }
        return implode("\n", $item);
    }

    private function setItem(Menu $model)
    {
        $is_parent = $model->menus ? 1 : 0;
        $child = $is_parent ? $this->initItemChildUl($model) : '';
        //$is_active = Yii::$app->controller->id;
        if (!$child) {
            return Html::tag(
                'li',
                Html::a(
                    $model->name,
                    $this->initLink($model),
                )
            );
        }
        return Html::tag(
            'li',
            Html::tag(
                'div',
                Html::a(
                    $model->name,
                    $this->initLink($model),
                    [
                        'class' => 'dropdown-toggle',
                        'role' => 'button',
                        'id' => 'dropdownMenuLink',
                        'data-mdb-toggle' => 'dropdown',
                        'aria-expanded' => false,
                    ]
                ) . " " . $child,
                [
                    'class' => [
                        $is_parent ? "dropdown" : "",
                        //$is_active ? "current" : $is_active,
                    ]
                ],
            )
        );
    }

    private function setItemChild(Menu $model)
    {
        $items = [];
        if ($model->menus) {
            $menus = $model->getMenus()
                ->andWhere([
                    'status' => StatusEnum::ACTIVE
                ])
                ->orderBy([
                    'order' => SORT_ASC
                ])
                ->all();
            foreach ($menus as $menu) {
                $items[] = Html::tag(
                    'li',
                    Html::a(
                        $menu->name,
                        $this->initLink($menu),
                        [
                            'class' => 'dropdown-item'
                        ]
                    )
                );
            }
        }
        return implode("\n", $items);
    }

    private function initItemChildUl(Menu $model)
    {
        return Html::tag(
            'ul',
            $this->setItemChild($model),
            [
                'class' => 'dropdown-menu',
                'aria-labelledby' => 'dropdownMenuLink',
            ]
        );
    }

    private function initLink(Menu $menu)
    {
        $id = $menu->item;
        if ($menu->type == TypeEnum::LINK) {
            $link = $menu->item;
        } elseif ($menu->type == TypeEnum::PAGE) {
            $link = Url::to(["/page/view", 'id' => $id]);
        } elseif ($menu->type == TypeEnum::POST) {
            $link = Url::to(["/post/view", 'slug' => $id]);
        } elseif ($menu->type == TypeEnum::CATEGORY) {
            $link = Url::to(["/post/index", 'category_id' => $id]);
        }
        return $link;
    }
}