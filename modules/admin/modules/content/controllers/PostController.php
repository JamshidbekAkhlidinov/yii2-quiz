<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:39:28
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\content\controllers;

use app\modules\admin\modules\content\forms\PostForm;
use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\search\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
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
        $model = new Post();
        return $this->form($model, 'create',);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }

    public function form(Post $model, $view)
    {

        $form = new PostForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
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

    protected function findModel($id)
    {
        if (($model = Post::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
