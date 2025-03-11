<?php

namespace app\modules\admin\repository;

use app\modules\admin\modules\content\models\PostCategory;
use app\modules\admin\modules\content\models\PostTag;
use yii\helpers\ArrayHelper;

class ModelRepository
{
    public static function getTags()
    {
        return ArrayHelper::map(
            PostTag::find()->all(),
            'id',
            'name',
        );
    }

    public static function getCateories()
    {
        return ArrayHelper::map(
            PostCategory::find()->all(),
            'id',
            'name',
        );
    }
}