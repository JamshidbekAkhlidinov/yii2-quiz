<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\content\controllers;

use app\modules\admin\modules\content\forms\PostCategoryForm;
use app\modules\admin\modules\content\models\PostCategory;
use app\modules\admin\modules\content\search\PostCategorySearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostCategoryController implements the CRUD actions for PostCategory model.
 */
class PostCategoryController extends Controller
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


    public function actionIndex()
    {
        $searchModel = new PostCategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new PostCategory();
        $form = new PostCategoryForm($model);
        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['post-category/index']);
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $form,
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
        $model = new PostCategory();
        return $this->form($model, 'update');
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update',);
    }

    public function form(PostCategory $model, $view)
    {
        $form = new PostCategoryForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
            return $this->redirect(['post-category/index']);
        }

        return $this->renderAjax('_form', [
            'model' => $form,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = PostCategory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
