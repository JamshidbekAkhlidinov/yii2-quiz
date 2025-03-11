<?php

namespace app\modules\telegram\controllers;

use yii\web\Controller;

/**
 * Default controller for the `telegram` module
 */
class DefaultController extends Controller
{
    public function actionIndex()
    {
        return [
            'name' => 'index',
        ];
    }
}
