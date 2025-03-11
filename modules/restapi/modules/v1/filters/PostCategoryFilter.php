<?php
/*
 *  Jamshidbek Akhlidinov
 *   15 - 3 2024 15:13:28
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\filters;

use app\modules\restapi\base\FilterRequest;
use app\modules\restapi\modules\v1\resources\PostCategoryResource;

class PostCategoryFilter extends FilterRequest
{
    public function getResult()
    {
        return PostCategoryResource::find()
            ->active()
            ->all();
    }
}