<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 02 2024 08:16:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\forms\PageForm $model */

$this->title = translate('Update Page: {name}', [
    'name' => $model->model->title,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->title, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="page-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
