<?php
/*
 *  Jamshidbek Akhlidinov
 *   15 - 3 2024 15:15:3
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\resources;

use app\modules\admin\modules\content\models\PostCategory;


class PostCategoryResource extends PostCategory
{
    public function fields()
    {
        return [
            'name',
            'image',
        ];
    }

    public function extraFields()
    {
        return [
            'sub_text',
            'status',
            'created_at',
            'created_by',
        ];
    }
}