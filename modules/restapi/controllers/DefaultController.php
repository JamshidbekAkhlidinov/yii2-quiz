<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 2 2024 16:21:19
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionError()
    {
        return [
            'error' => 'Error'
        ];
    }

    public function actionIndex()
    {
        app()->response->statusCode = 404;
        return [
            'code' => 202,
            'message' => 'Rest api running',
        ];
    }

}