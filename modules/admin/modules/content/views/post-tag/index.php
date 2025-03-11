<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:41:20
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\modules\content\models\PostTag;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\search\PostTagSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate("Post Tags");
params()['breadcrumbs'][] = ['label' => translate("Content"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$this->title = translate('Post Tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-tag-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
</div>

<div class="row">

    <div class="col-md-8">
        <div class="card card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    [
                        'attribute' => 'name',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a(
                                $data->name,
                                [
                                    'post-tag/index',
                                    'update_id' => $data->id,
                                ]
                            );
                        },
                    ],
                    //'deleted_at',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{delete}',
                        'urlCreator' => function ($action, PostTag $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
