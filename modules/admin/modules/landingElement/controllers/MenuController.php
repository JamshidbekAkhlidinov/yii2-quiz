<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace app\modules\admin\modules\landingElement\controllers;

use app\modules\admin\enums\PositionMenuEnum;
use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\landingElement\forms\MenuForm;
use app\modules\admin\modules\landingElement\models\DataToArray;
use app\modules\admin\modules\landingElement\models\Menu;
use app\modules\admin\modules\landingElement\search\MenuSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
     * Lists all Menu models.
     *
     * @return string
     */
    public function actionIndex($position_menu = null)
    {
        $searchModel = new MenuSearch(['position_menu' => $position_menu]);
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
        $model = new Menu();
        return $this->form($model, 'create');
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->form($model, 'update');
    }

    public function form(Menu $model, $view)
    {
        $form = new MenuForm($model);
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

    public function actionList()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_all_params'];
            if ($parents != null) {
                $cat_id = $parents['type'];
                $data_s = DataToArray::getModel($cat_id);
                if ($data_s != null) {
                    foreach ($data_s as $id => $data) {
                        $out[$id]['id'] = $data->id;
                        if ($cat_id == TypeEnum::CATEGORY) {
                            $out[$id]['name'] = $data->name;
                        } else {
                            $out[$id]['name'] = $data->title;
                        }
                    }
                }
                return ['output' => $out, 'selected' => 'test'];
            }
        }

        return ['output' => $out, 'selected' => 'test'];
    }

    protected function findModel($id)
    {
        if (($model = Menu::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(translate('The requested page does not exist.'));
    }
}
