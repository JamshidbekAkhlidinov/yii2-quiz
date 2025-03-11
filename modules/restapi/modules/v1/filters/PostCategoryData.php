<?php
/*
 *  Jamshidbek Akhlidinov
 *   15 - 3 2024 15:13:28
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\filters;

use app\modules\admin\modules\content\models\PostCategory;
use app\modules\restapi\base\FilterRequest;
use app\modules\restapi\modules\v1\resources\PostCategoryResource;

class PostCategoryData extends FilterRequest
{
    public PostCategory $model;

    public function __construct(PostCategory $model, $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }

    public function getResult()
    {
        return PostCategoryResource::findOne($this->model->id);
    }
}