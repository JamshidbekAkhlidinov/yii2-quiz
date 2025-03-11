<?php

use app\models\User;
use app\modules\admin\models\CardAssigned;
use app\modules\admin\models\Question;
use app\modules\admin\models\Subject;
use app\modules\admin\models\Test;
use app\modules\admin\models\UserTest;
use app\modules\user\components\buttons\CardButtons;
use app\modules\user\components\buttons\UserTestButtons;
use app\modules\user\search\UserTestSearch;
use app\widgets\CardWidget;
use yii\bootstrap5\Html;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var $dataProvider ActiveDataProvider
 * @var $searchModel UserTestSearch
 * @var $this View
 * @var $cards CardAssigned
 * @var $card CardAssigned
 */

$this->title = translate("My results");
?>
<div class="row">

    <?= CardWidget::widget([
        'title' => translate("Users"),
        'count' => User::find()->count(),
    ]) ?>

    <?= CardWidget::widget([
        'title' => translate("Subjects"),
        'count' => Subject::find()->count(),
    ]) ?>


    <?= CardWidget::widget([
        'title' => translate("Tests"),
        'count' => Test::find()->count(),
    ]) ?>


    <?= CardWidget::widget([
        'title' => translate("Questions"),
        'count' => Question::find()->count(),
    ]) ?>

    <?= CardWidget::widget([
        'title' => translate("Attempts"),
        'count' => UserTest::find()->count(),
    ]) ?>

    <?= CardWidget::widget([
        'title' => translate("Cards"),
        'count' => CardAssigned::find()->count(),
    ]) ?>


</div> <!-- end row-->

<div class="user-test-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <span>
            <?= UserTestButtons::create() ?>
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
                                ['/user/default/view', 'id' => $model->id]
                            );
                        }
                    }
                ],
                [
                    'attribute' => 'selected_test_id',
                    'value' => static function ($model) {
                        if ($data = $model->selectedTest) {
                            return $data->name;
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


<!--<div class="card">-->
<!--    <div class="card-header  d-flex justify-content-between">-->
<!--        <h2>--><?php //= translate("My Cards") ?><!--</h2>-->
<!--        <span>-->
<!--            --><?php //= CardButtons::create() ?>
<!--        </span>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!---->
<!--<div class="row">-->
<!--    --><?php //foreach ($cards as $card) { ?>
<!--        <div class="col-md-6">-->
<!--            <div class="card">-->
<!--                <div class="card-header">-->
<!--                    <h6 class="card-title mb-0">-->
<!--                        --><?php //= translate("CARD ID: {id}", ['id' => $card->id]) ?>
<!--                    </h6>-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <blockquote class="card-blockquote mb-0">-->
<!--                        --><?php
//                        foreach ($card->cardAssignedItems as $item) {
//                            $text = $item->cardData->text;
//                            ?>
<!--                            <figure class="mb-0">-->
<!--                                <blockquote class="blockquote">-->
<!--                                    --><?php //= $text ?>
<!--                                </blockquote>-->
<!--                            </figure>-->
<!--                            --><?php
//                        }
//                        ?>
<!--                    </blockquote>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        --><?php
//    }
//    ?>
<!--</div>-->