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

use app\modules\admin\modules\landingElement\components\buttons\ServiceButtons;
use yii\bootstrap5\Html;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;

$this->title = translate("Services");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2><?= $this->title ?></h2>
        <?= ServiceButtons::create() ?>
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
                    'attribute' => 'files',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::img($model->files,
                        [
                                'width'  => '130'
                        ]);
                    }
                ],
                [
                    'attribute' => 'title',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return ServiceButtons::update($data);
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
