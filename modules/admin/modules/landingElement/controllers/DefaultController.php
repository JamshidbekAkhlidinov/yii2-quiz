<?php

namespace app\modules\admin\modules\landingElement\controllers;

use yii\web\Controller;

/**
 * Default controller for the `landingElement` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
