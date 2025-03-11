<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:23:19
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\TestResultStatusEnum;
use app\modules\admin\models\UserTest;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\UserTestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate( 'User Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-test-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'user_id',
                [
                    'attribute' => 'subject_id',
                    'value' => static function ($model) {
                        if ($data = $model->subject) {
                            return $data->name;
                        }
                    }
                ],
                [
                    'attribute' => 'test_id',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        if ($data = $model->test) {
                            return Html::a(
                                $data->name,
                                ['view', 'id' => $model->id]
                            );
                        }
                    }
                ],
                [
                    'attribute' => 'selected_test_id',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        if ($data = $model->selectedTest) {
                            return Html::a(
                                $data->name,
                                ['view', 'id' => $model->id]
                            );
                        }
                    }
                ],
                [
                    'attribute' => 'solve_ball',
                    'value' => static function ($model) {
                        return $model->total_ball . "/" . $model->solve_ball;
                    }
                ],
                [
                    'attribute' => 'solve_count',
                    'value' => static function ($model) {
                        return $model->total_count . "/" . $model->solve_count;
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'value' => static function ($model) {
                        return dateFormat($model->created_at);
                    }
                ],
                [
                    'attribute' => 'expired_at',
                    'value' => static function ($model) {
                        return dateFormat($model->expired_at);
                    }
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => static function ($data) {
                        return getTestStatus($data->status);
                    },
                    'filter' => array_map(function ($item) {
                        return translate($item);
                    }, TestResultStatusEnum::ALL)
                ],
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => static function ($data) {
                        if ($user = $data->user) {
                            return $user->getPublicIdentity();
                        }
                    },
                ],
                [
                    'class' => ActionColumn::className(),
                    'template' => '{view} {delete}',
                    'urlCreator' => function ($action, UserTest $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
