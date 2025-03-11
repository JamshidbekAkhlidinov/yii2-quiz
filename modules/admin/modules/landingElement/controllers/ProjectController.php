<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:50:24
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\controllers;

use app\modules\admin\modules\landingElement\base\BaseController;
use app\modules\admin\modules\landingElement\forms\ProjectForm;

class ProjectController extends BaseController
{
    public function actionForm()
    {
        return $this->return(
            new ProjectForm(),
        );
    }
}