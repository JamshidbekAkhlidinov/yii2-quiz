<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\modules\landingElement\models\Menu;
use app\modules\admin\modules\landingElement\widgets\MenuGroupButtonWidget;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\search\MenuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index card">
    <div class="card-header">
        <div class=" d-flex justify-content-between">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                <?= Html::a(translate('Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
        <?=MenuGroupButtonWidget::widget()?>
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
//            'order',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => static function ($model) {
                    return Html::tag(
                        'span',
                        StatusEnum::ALL[$model->status] ?? "",
                    );
                }
            ],
            'item',
            //'icon',
            //'parent_id',
            //'type',
            //'position_menu',
            //'created_at',
            //'updated_at',
            //'label_position',
            //'slug',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Menu $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    </div>
</div>
