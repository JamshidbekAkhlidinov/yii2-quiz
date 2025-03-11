<?php

use app\modules\admin\enums\AuthItemTypeEnum;
use app\modules\admin\modules\rbac\components\buttons\AuthItemButtons;
use app\modules\admin\modules\rbac\models\AuthItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\search\AuthItem $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Auth Items');

?>
<div class="auth-item-index card">

    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= AuthItemButtons::create() ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return AuthItemButtons::update($model->name);
                    }
                ],
                [
                    'attribute' => 'type',
                    'format' => 'raw',
                    'value' => static function ($item) {
                        return Html::a(
                            AuthItemTypeEnum::ALL[$item->type] ?? "",
                            [
                                'auth-item-child/index',
                                'parent' => $item->name
                            ]
                        );
                    }
                ],
                'description:ntext',
                'rule_name',
                'data',
                //'created_at',
                //'updated_at',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, AuthItem $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'name' => $model->name]);
                    }
                ],
            ],
        ]); ?>
    </div>

</div>
