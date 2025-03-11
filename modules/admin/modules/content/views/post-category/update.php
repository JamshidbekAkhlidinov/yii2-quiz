<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\forms\PostCategoryForm $model */

$this->title = translate('Update Post Category: {name}', [
    'name' => $model->model->name,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Post Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->name, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="post-category-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
