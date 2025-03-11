<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\PostCategory $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => translate('Post Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-category-view card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate('Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(translate('Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => translate('Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="card-header">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                [
                    'format' => 'raw',
                    'attribute' => 'image',
                    'value' => static function ($model) {
                        return Html::img($model->image, ['width' => '150px']);
                    },
                ],
                'sub_text',
                'status',
                'created_at',
                'created_by',
            ],
        ]) ?>
    </div>
</div>
