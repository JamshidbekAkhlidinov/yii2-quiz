<?php

use app\models\User;
use app\modules\admin\modules\rbac\components\buttons\AuthAssignmentButtons;
use app\modules\admin\modules\rbac\models\AuthAssignment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\search\AuthAssignmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Auth Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index card">

    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= AuthAssignmentButtons::create() ?>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'user_id',
                    'value' => function ($data) {
                        $user = User::findOne(['id' => $data->user_id]);
                        return $user->publicIdentity;
                    },
                ],
                [
                    'attribute' => 'item_name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return AuthAssignmentButtons::update($model->item_name, $model->user_id);
                    }
                ],
                'created_at:datetime',
                [
                    'class' => ActionColumn::className(),
                    'template' => "{delete}",
                    'urlCreator' => function ($action, AuthAssignment $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'item_name' => $model->item_name, 'user_id' => $model->user_id]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>
