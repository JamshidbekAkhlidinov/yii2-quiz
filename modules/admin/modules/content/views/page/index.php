<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 02 2024 08:16:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\modules\content\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\search\PageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <div>
            <?= Html::a(translate('Create Page'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'title:ntext',
                //'content:ntext',
                //'slug',
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return StatusEnum::ALL[$model->status] ?? "";
                    }
                ],
                //'sidebar',
                'created_at',
                //'updated_at',
                [
                    'attribute' => 'created_by',
                    'value' => function ($model) {
                        if ($user = $model->createdBy) {
                            return $user->publicIdentity;
                        }
                    }
                ],
                //'updated_by',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Page $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
