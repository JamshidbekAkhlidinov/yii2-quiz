<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\components\buttons\TestButton;
use app\modules\admin\models\ModelToData;
use app\modules\admin\models\Test;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\TestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <span>
        <?= TestButton::uploadFile() ?>
        <?= TestButton::create() ?>
        </span>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'attribute' => 'subject_id',
                    'format' => 'raw',
                    'value' => function (Test $model) {
                        if ($subject = $model->subject) {
                            return $subject->name;
                        }
                    },
                    'filter' => ModelToData::getSubject()
                ],
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function (Test $model) {
                        return TestButton::update($model);
                    }
                ],
                [
                    'header' => translate("Question count"),
                    'format' => 'raw',
                    'value' => function ($data) {
                        $count = $data->getQuestions()->count();
                        return Html::a(
                            $count . " ta",
                            [
                                'question/index',
                                'test_id' => $data->id,
                                'subject_id' => $data->subject_id
                            ],
                            [
                                'title' => translate("Enter Question")
                            ]
                        );
                    },
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return getStatus($data->status);
                    },
                ],
                'description',
                'started_at',
                'ended_at',
                //'created_at',
                //'updated_at',
                //'created_by',
                //'updated_by',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, Test $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
