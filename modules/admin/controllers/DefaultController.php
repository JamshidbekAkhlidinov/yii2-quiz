<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 16:35:36
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEditor()
    {
        return $this->render('editor');
    }


    public function actionData()
    {
        dd($_SERVER);
    }
}
