<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:2:48
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\controllers;

use app\modules\admin\enums\LandingElementEnum;
use app\modules\admin\modules\landingElement\base\BaseController;
use app\modules\admin\modules\landingElement\forms\OpinionForm;
use app\modules\admin\modules\landingElement\models\LandingElement;
use app\modules\admin\modules\landingElement\search\OpinionSearch;
use Exception;
use yii\db\StaleObjectException;
use yii\helpers\Html;

class OpinionController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new OpinionSearch();
        $dataProvider = $searchModel->search(app()->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }


    public function actionCreate()
    {
        return $this->form(
            new LandingElement([
                'key' => LandingElementEnum::OPINION
            ])
        );
    }

    /**
     * @throws Exception
     */
    public function actionUpdate($id)
    {
        return $this->form(
            $this->getModel($id)
        );
    }

    public function form(LandingElement $model)
    {
        $form = new OpinionForm([
            'element' => $model,
        ]);
        if ($form->load(post()) && $form->validate()) {
            $isSave = $this->registerSaveStatusTrait(
                $form->save(),
                translate("Saved"),
                Html::errorSummary($form),
            );
            if ($isSave) {
                return $this->redirect(['opinion/index']);
            }
        }
        return $this->render('form', [
            'formModel' => $form
        ]);
    }

    /**
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDelete($id)
    {
        $this->getModel($id)->delete();
        return $this->redirect(['index']);
    }


    /**
     * @throws Exception
     */
    public function getModel($id)
    {
        $model = LandingElement::findOne([
            'id' => $id,
            'key' => LandingElementEnum::OPINION
        ]);
        if (!$model) {
            throw new Exception(translate("Service not found"));
        }
        return $model;
    }
}