<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:36:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TelegramCompany $model */

$this->title = translate('Update Telegram Company: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Telegram Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="telegram-company-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
