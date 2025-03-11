<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 07 2024 10:57:13
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\CardData $model */

$this->title = translate('Update Card Data: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Card Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="card-data-update card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
