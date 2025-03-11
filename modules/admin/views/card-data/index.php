<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 07 2024 10:57:13
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\CardDataTypeEnum;
use app\modules\admin\models\CardData;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\CardDataSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Card Datas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-data-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate('Create Card Data'), ['create'], ['class' => 'btn btn-success']) ?>
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
                [
                    'attribute' => 'subject_id',
                    'value' => static function (CardData $model) {
                        return ($subject = $model->subject) ? $subject->name : "";
                    }
                ],
                [
                    'attribute' => 'text',
                    'value' => static function (CardData $model) {
                        return strip_tags($model->text);
                    }
                ],
                [
                    'attribute' => 'type',
                    'value' => static function (CardData $model) {
                        return translate( CardDataTypeEnum::LABELS[$model->type]);
                    },
                    'filter' => array_map(function ($item){
                        return translate($item);
                    },CardDataTypeEnum::LABELS),
                ],
                'created_at',
                //'updated_at',
                //'created_by',
                //'updated_by',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, CardData $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
