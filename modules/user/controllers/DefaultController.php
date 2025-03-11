<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:24:21
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\user\controllers;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\enums\TestResultStatusEnum;
use app\modules\admin\models\CardAssigned;
use app\modules\admin\models\ModelToData;
use app\modules\admin\models\UserTest;
use app\modules\admin\models\UserTestItem;
use app\modules\user\forms\CalculateBallForm;
use app\modules\user\forms\CheckedAnswerForm;
use app\modules\user\forms\UserCardForm;
use app\modules\user\forms\UserTestForm;
use app\modules\user\search\UserTestSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UserTestController implements the CRUD actions for UserTest model.
 */
class DefaultController extends Controller
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
                        'send-answer' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new UserTestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $cards = CardAssigned::find()
            ->andWhere(['assign_user_id' => user()->id])
            ->all();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cards' => $cards,
        ]);
    }


    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($model->status == StatusEnum::ACTIVE) {
            return $this->render('view', [
                'model' => $model
            ]);
        }
        return $this->render('result', [
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $form = new UserTestForm();
        $test_id = get('test_id');
        $selected_test_id = get('selected_test_id');
        if ($test_id || $selected_test_id) {
            $form->test_id = $test_id;
            $form->subject_id = get('subject_id');
            $form->selected_test_id = $selected_test_id;
            $isSave = $form->save();
            if (!$isSave) {
                session()->setFlash('alert', [
                    'body' => translate("Time is up"),
                    'options' => [
                        'class' => 'alert alert-warning'
                    ]
                ]);
                return $this->redirect(['default/index']);
            }
            return $this->redirect(['default/view', 'id' => $form->model_id]);
        }

        if ($form->load(post()) && $form->save()) {
            return $this->redirect(['default/view', 'id' => $form->model_id]);
        }
        return $this->renderAjax('_form', [
            'model' => $form,
        ]);
    }

    public function actionCreateCard()
    {
        $form = new UserCardForm();
        if ($form->load(post())) {
            if (!$form->save()) {
                Yii::$app->session->setFlash('alert', [
                    'body' => translate("Card not found or you have other errors"),
                    'options' => [
                        'class' => 'alert alert-warning',
                    ],
                ]);
            }
            return $this->redirect(['default/index']);
        }
        return $this->renderAjax('_card_form', [
            'model' => $form,
        ]);
    }


    public function actionTest($subject_id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!$subject_id) {
            return [];
        }
        return ModelToData::getTest($subject_id);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index']);
    }


    public function actionSaveAnswer($id)
    {
        app()->response->format = Response::FORMAT_JSON;

        $test_id = post('test_id');
        if ($test_id == $id) {
            $model = $this->findModel($id);

            if ($model->status == TestResultStatusEnum::ACTIVE) {
                $form = new CalculateBallForm($model);
                if ($form->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                return $form->getErrors();
            }
        }
        return false;
    }

    public function actionSendAnswer()
    {
        app()->response->format = Response::FORMAT_JSON;
        $test_id = post('test_id');
        //$answer_id = post('answer_id');
        $selectedAnswers = post('selectedItems');
        $testModel = $this->findTestItem($test_id);
        $form = new CheckedAnswerForm($testModel);
        $form->selectedItems = $selectedAnswers;
        $form->test_id = $test_id;
        return $form->save();
    }

    protected function findModel($id)
    {
        if (($model = UserTest::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }

    protected function findTestItem($condition)
    {
        if (($model = UserTestItem::findOne($condition)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
