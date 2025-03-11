<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 07 2024 15:30:20
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\controllers;

use app\forms\PdfForm;
use app\modules\admin\forms\BlancForm;
use app\modules\admin\forms\CardForm;
use app\modules\admin\models\Card;
use app\modules\admin\search\CardSearch;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CardController implements the CRUD actions for Card model.
 */
class CardController extends Controller
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
     * Lists all Card models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CardSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Card model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $assignCard = $model->getCardAssigneds();

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => new ActiveDataProvider([
                'query' => $assignCard,
                'pagination' => [
                    'pageSize' => 100,
                ],
            ])
        ]);
    }


    public function actionCreate()
    {
        $model = new Card();
        return $this->form($model, 'create');
    }

    public function actionPreviewPdf($id)
    {
        $model = $this->findModel($id);
        $assignCard = $model->getCardAssigneds();
        $content = $this->renderPartial('_list', [
            'model' => $model,
            'dataProvider' => new ActiveDataProvider([
                'query' => $assignCard,
                'pagination' => [
                    'pageSize' => 100,
                ],
            ])
        ]);
        $form = new PdfForm(
            $content
        );
        return $form->save();
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }

    public function form(Card $model, $view)
    {
        $form = new CardForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
            return $this->redirect(['view', 'id' => $form->model->id]);
        }

        return $this->render($view, [
            'model' => $form,
        ]);
    }


    public function actionCreateBlanc($id)
    {
        $model = $this->findModel($id);

        $form = new BlancForm($model);

        $form->save();

        return $this->redirect(['view', 'id' => $id]);
    }

    /**
     * Deletes an existing Card model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Card model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Card the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Card::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
