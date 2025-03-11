<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 4 2024 9:33:28
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\controllers;

use app\modules\restapi\controllers\BaseController;

class TestController extends BaseController
{
    public function actionIndex()
    {
        return [
            "ok" => true,
            'data' => post()
        ];
    }
}