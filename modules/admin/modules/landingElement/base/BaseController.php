<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 19:37:40
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\modules\landingElement\base;

use app\traits\SaveStatusAlertTrait;
use yii\bootstrap5\Html;
use yii\web\Controller;

class BaseController extends Controller
{
    use SaveStatusAlertTrait;

    public function return(LandingModel $form, $filename = 'form', $modelName = 'formModel')
    {
        if ($form->load(post())) {
            $this->registerSaveStatusTrait(
                $form->save(),
                translate('Saved'),
                Html::errorSummary($form)
            );
            return $this->redirect([$this->action->id]);
        }
        return $this->render($filename, [
            $modelName => $form
        ]);
    }
}