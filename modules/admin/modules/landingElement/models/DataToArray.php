<?php

namespace app\modules\admin\modules\landingElement\models;


use app\modules\admin\enums\StatusEnum;
use app\modules\admin\enums\TypeEnum;
use app\modules\admin\models\Subject;
use app\modules\admin\modules\content\models\Page;
use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\models\PostCategory;
use yii\helpers\ArrayHelper;

class DataToArray
{

    public static function getParentMenu($id = null)
    {
        $model = Menu::find();
        if ($id != null) {
            $model->andWhere([
                '!=', 'id', $id
            ]);
        }
        return ArrayHelper::map(
            $model->all(),
            'id',
            function (Menu $model) {
                return $model->name;
            }
        );
    }

    public static function getModel($enum)
    {
        if ($enum == TypeEnum::POST) {
            $model = Post::find()
                ->andWhere([
                    'status' => StatusEnum::ACTIVE
                ])
                ->all();
        } elseif ($enum == TypeEnum::CATEGORY) {
            $model = PostCategory::find()
                ->andWhere([
                    'status' => StatusEnum::ACTIVE
                ])
                ->all();
        } elseif ($enum == TypeEnum::PAGE) {
            $model = Page::find()
                ->andWhere([
                    'status' => StatusEnum::ACTIVE
                ])
                ->all();
        } else {
            $model = null;
        }
        return $model;
    }

    public static function getListMenu($enum)
    {
        if (self::getModel($enum) == null) {
            return [];
        }
        if ($enum == TypeEnum::CATEGORY) {
            return ArrayHelper::map(
                self::getModel($enum),
                'id',
                'name'
            );
        } else {
            return ArrayHelper::map(
                self::getModel($enum),
                'id',
                'title'
            );
        }

    }
}