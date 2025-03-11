<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 05 2024 12:30:39
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\forms\MessageForm $model */

$this->title = translate('Update I18n Source Message: {name}', [
    'name' => $model->model->id,
]);
$this->params['breadcrumbs'][] = ['label' => translate('I18n Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->id, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="i18n-source-message-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
