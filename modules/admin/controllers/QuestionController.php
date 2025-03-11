<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\controllers;

use app\modules\admin\forms\QuestionForm;
use app\modules\admin\models\Question;
use app\modules\admin\models\UserTestItem;
use app\modules\admin\search\QuestionSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
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
     * Lists all Question models.
     *
     * @return string
     */
    public function actionIndex($test_id)
    {
        $searchModel = new QuestionSearch(['test_id' => $test_id]);
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate($test_id, $subject_id)
    {
        $model = new Question([
            'test_id' => $test_id,
            'subject_id' => $subject_id,
        ]);
        return $this->form($model, 'create');

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        return $this->form($model, 'update');
    }

    public function form(Question $model, $view)
    {
        if ($model->isNewRecord) {
            $model->loadDefaultValues();
        }

        $form = new QuestionForm($model);

        if ($form->load(post()) && $form->validate() && $form->save()) {
            return $this->redirect([
                'index',
                'subject_id' => $model->subject_id,
                'test_id' => $model->test_id
            ]);
        }

        return $this->render($view, [
            'model' => $form,
        ]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        foreach ($model->answers as $answer) {
            echo $answer->delete();
        }
        UserTestItem::deleteAll(['question_id' => $model->id]);
        $model->delete();
        return $this->redirect(['index', 'test_id' => $model->test_id]);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
