<?php

use app\modules\admin\modules\rbac\components\buttons\AuthAssignmentButtons;
use app\modules\admin\modules\rbac\components\buttons\AuthItemChildButtons;
use app\modules\admin\modules\rbac\models\AuthItemChild;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\search\AuthItemChildSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Auth Item Children');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-index card">

    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= AuthItemChildButtons::create() ?>
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
                    'attribute' => 'parent',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return AuthItemChildButtons::update($model,$model->parent);
                    }
                ],
                [
                    'attribute' => 'child',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return AuthItemChildButtons::update($model,$model->child);
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, AuthItemChild $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'parent' => $model->parent, 'child' => $model->child]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

</div>
