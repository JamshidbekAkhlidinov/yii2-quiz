<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 06 2024 12:49:46
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\controllers;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\forms\SelectedTestForm;
use app\modules\admin\models\SelectedTest;
use app\modules\admin\search\SelectedTestSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * SelectedTestController implements the CRUD actions for SelectedTest model.
 */
class SelectedTestController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SelectedTest models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SelectedTestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SelectedTest model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new SelectedTest();
        return $this->form($model, 'create');

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        return $this->form($model, 'update');
    }

    public function form(SelectedTest $model, $view)
    {
        if ($model->isNewRecord) {
            $model->loadDefaultValues();
        }
        $form = new SelectedTestForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
            return $this->redirect(['index']);
        }

        return $this->render($view, [
            'model' => $form,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            $model->delete();
        } catch (\Exception $exception) {
            $model->status = StatusEnum::INACTIVE;
            $model->save();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the SelectedTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SelectedTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SelectedTest::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
