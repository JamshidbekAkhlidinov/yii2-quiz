<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\modules\content\components\buttons\PostCategoryButtons;
use app\modules\admin\modules\content\models\PostCategory;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\search\PostCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\modules\admin\modules\content\models\PostCategory $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = translate("Post Categories");
params()['breadcrumbs'][] = ['label' => translate("Content"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$this->title = translate('Post Categories');
$this->params['breadcrumbs'][] = $this->title;

$query = PostCategory::find()
    ->orderBy(['created_at' => SORT_DESC]); // created_at bo'yicha tartiblash

// Ma'lumotlarni olish
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);
?>

<div class="post-category-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= PostCategoryButtons::create() ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                [
                    'attribute' => 'image',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::img($model->image, ['width' => '150px']);
                    }
                ],
                [
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return PostCategoryButtons::update($model->id, $model->name);
                    }
                ],
                // 'sub_text',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            StatusEnum::ALL[$model->status] ?? "",
                            [
                                'class' => [
                                    'badge ',
                                    StatusEnum::COLORS[$model->status] ?? ""
                                ]
                            ]
                        );
                    }
                ],
                //'created_at',
                //'created_by',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, PostCategory $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>
