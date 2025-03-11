<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 05 2024 12:30:39
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\controllers;

use app\modules\admin\forms\MessageForm;
use app\modules\admin\models\I18nSourceMessage;
use app\modules\admin\search\I18nSourceMessageSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * TranslationMessageController implements the CRUD actions for I18nSourceMessage model.
 */
class TranslationMessageController extends Controller
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
        $searchModel = new I18nSourceMessageSearch();
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
        $model = new I18nSourceMessage();
        return $this->form($model, 'create');
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }

    private function form(I18nSourceMessage $model, $view)
    {
        $form = new MessageForm($model);
        if ($form->load($this->request->post()) && $form->save()) {
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
        if (($model = I18nSourceMessage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
