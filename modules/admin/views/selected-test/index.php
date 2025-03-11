<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 06 2024 12:49:46
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\SelectedTest;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\SelectedTestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate( 'Selected Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selected-test-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate( 'Create Selected Test'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'name',
                'description',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return getStatus($model->status);
                    }
                ],
                'created_at',
                //'updated_at',
                'created_by',
                //'updated_by',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, SelectedTest $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
