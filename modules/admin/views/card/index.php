<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 07 2024 16:53:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\Card;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\CardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Cards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate('Create Card'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
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
                    'value' => static function ($model) {
                        if ($data = $model->subject) {
                            return $data->name;
                        }
                        return null;
                    }
                ],
                'name',
                'count',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return getStatus($model->status);
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Card $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
