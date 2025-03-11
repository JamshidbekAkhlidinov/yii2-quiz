<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 06 2024 12:49:46
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\modules\admin\forms\SelectedTestForm $model */

$this->title = translate( 'Update Selected Test: {name}', [
    'name' => $model->model->name,
]);
$this->params['breadcrumbs'][] = ['label' => translate( 'Selected Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->name, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate( 'Update');
?>
<div class="selected-test-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
