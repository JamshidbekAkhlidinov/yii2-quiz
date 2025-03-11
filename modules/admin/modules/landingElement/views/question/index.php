<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:4
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel app\modules\admin\modules\landingElement\search\ServiceSearch
 * @var $this yii\web\View
 */

use app\modules\admin\modules\landingElement\components\buttons\QuestionButtons;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;

$this->title = translate("Questions");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2><?= $this->title ?></h2>
        <?= QuestionButtons::create() ?>
    </div>
    <div class="card-body">
        <?php
        echo \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => SerialColumn::class,
                ],
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return QuestionButtons::update($data);
                    },
                ],
                'description',
                [
                    'class' => ActionColumn::class,
                    'template' => '{delete}',
                ]
            ]
        ]);
        ?>
    </div>
</div>
