<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 07 2024 15:30:20
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\modules\admin\forms\CardForm $model */

$this->title = translate('Update Card: {name}', [
    'name' => $model->model->name,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->name, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="card-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
