<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\modules\admin\forms\QuestionForm $model */

$this->title = translate('Update Question: {name}', [
    'name' => $model->model->id,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->id, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="question-update">
    <div class="d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
