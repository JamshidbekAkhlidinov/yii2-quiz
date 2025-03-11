<?php
/*
 *  Jamshidbek Akhlidinov
 *   15 - 3 2024 15:12:18
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\controllers;

use app\modules\admin\modules\content\models\PostCategory;
use app\modules\restapi\controllers\BaseController;
use app\modules\restapi\modules\v1\filters\PostCategoryData;
use app\modules\restapi\modules\v1\filters\PostCategoryFilter;
use app\modules\restapi\modules\v1\forms\PostCategoryDeleteForm;
use app\modules\restapi\modules\v1\forms\PostCategoryForm;
use yii\console\Exception;


class PostCategoryController extends BaseController
{
    public function actionIndex()
    {
        return $this->sendResponse(
            new PostCategoryFilter(),
        );
    }

    public function actionCreate()
    {
        return $this->sendResponse(
            new PostCategoryForm(
                new PostCategory()
            ),
            post()
        );
    }

    public function actionUpdate($id)
    {
        return $this->sendResponse(
            new PostCategoryForm(
                $this->findModel($id),
            ),
            post(),
        );
    }

    public function actionView($id)
    {
        return $this->sendResponse(
            new PostCategoryData(
                $this->findModel($id),
            )
        );
    }

    public function actionDelete($id)
    {
        return $this->sendResponse(
            new PostCategoryDeleteForm(
                $this->findModel($id),
            )
        );
    }

    public function findModel($id)
    {
        if ($model = PostCategory::findOne($id)) {
            return $model;
        }
        throw  new Exception();
    }
}