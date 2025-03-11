<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\controllers;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\Test;
use app\modules\admin\search\TestSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * TestController implements the CRUD actions for Test model.
 */
class TestController extends Controller
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
     * Lists all Test models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Test model.
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
        $model = new Test();
        return $this->form($model, 'create');

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        return $this->form($model, 'update');
    }

    public function form(Test $model, $view)
    {
        if ($model->isNewRecord) {
            $model->loadDefaultValues();
        }

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax($view, [
            'model' => $model,
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
     * Finds the Test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate( 'The requested page does not exist.'));
    }
}
