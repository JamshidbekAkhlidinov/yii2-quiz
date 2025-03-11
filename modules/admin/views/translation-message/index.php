<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 05 2024 12:30:39
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\LanguageEnum;
use app\modules\admin\models\I18nSourceMessage;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\I18nSourceMessageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('I18n Source Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-source-message-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate('Create I18n Source Message'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'category',
                [
                    'format' => 'raw',
                    'attribute' => 'message',
                    'value' => function ($model) {
                        return Html::a(
                            $model->message,
                            [
                                'update', 'id' => $model->id,
                            ]
                        );
                    }
                ],
                [
                    'attribute' => 'languages',
                    'format' => 'raw',
                    'value' => function (I18nSourceMessage $model) {
                        $items = [];
                        if ($words = $model->getI18nMessages()->asArray()->all()) {
                            $words = array_column($words, 'translation', 'language');
                            foreach (LanguageEnum::LABELS as $kay => $label) {
                                $items[$kay] = "<b>" . $kay . '</b>: ' . $words[$kay] ?? "";
                            }
                            return implode("<br>", $items);
                        }
                    }
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{delete}'
                ]
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
