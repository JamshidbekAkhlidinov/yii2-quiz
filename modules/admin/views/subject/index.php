<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:05:59
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\components\buttons\SubjectButton;
use app\modules\admin\models\Subject;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\SubjectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate( 'Subjects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <span>
            <?php echo SubjectButton::create() ?>
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
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function (Subject $model) {
                        return SubjectButton::update($model);
                    }
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return getStatus($data->status);
                    },
                ],
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, Subject $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
