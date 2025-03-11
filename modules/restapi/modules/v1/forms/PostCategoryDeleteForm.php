<?php
/*
 *  Jamshidbek Akhlidinov
 *   15 - 3 2024 15:21:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\modules\admin\modules\content\models\PostCategory;
use app\modules\restapi\base\FormRequest;

class PostCategoryDeleteForm extends FormRequest
{
    public PostCategory $model;

    public function __construct(PostCategory $model, $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }


    public function getResult()
    {
        return $this->model->delete();
    }
}