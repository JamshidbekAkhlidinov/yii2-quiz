<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:41:20
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\content\controllers;

use app\modules\admin\modules\content\forms\PostTagForm;
use app\modules\admin\modules\content\models\PostTag;
use app\modules\admin\modules\content\search\PostTagSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostTagController implements the CRUD actions for PostTag model.
 */
class PostTagController extends Controller
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


    public function actionIndex($update_id = null)
    {
        $searchModel = new PostTagSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = PostTag::findOne(['id' => $update_id]);
        if (!$model) {
            $model = new PostTag();
        }

        $form = new PostTagForm($model);

        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['post-tag/index']);
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
        $model = new PostTag();
        return $this->form($model, 'create');
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }

    public function form(PostTag $model, $view)
    {

        $form = new PostTagForm($model);

        if ($form->load($this->request->post()) && $form->validate() && $form->save()) {
            return $this->redirect(['index']);
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
        if (($model = PostTag::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
