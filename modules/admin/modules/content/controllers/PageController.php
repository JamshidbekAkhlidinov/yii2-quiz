<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 02 2024 08:16:25
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\content\controllers;

use app\modules\admin\modules\content\forms\PageForm;
use app\modules\admin\modules\content\models\Page;
use app\modules\admin\modules\content\search\PageSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
     * Lists all Page models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Page();
        return $this->form($model, 'create',);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }

    public function form(Page $model, $view)
    {

        $form = new PageForm($model);
        if ($form->load($this->request->post())  && $form->save()) {
            return $this->redirect(['view', 'id' => $form->model->id]);
        }

        return $this->render($view, [
            'model' => $form,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
