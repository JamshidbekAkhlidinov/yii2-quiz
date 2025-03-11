<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Test $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => translate( 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="test-view card">
    <div class="card-header d-flex justify-content-between">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(translate( 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(translate( 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => translate( 'Are you sure you want to delete this item?'),
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
            'subject_id',
            'name',
            'status',
            'description',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>
    </div>
</div>
