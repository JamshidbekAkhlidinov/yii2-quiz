<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 06 2024 12:49:46
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SelectedTest $model */

$this->title = translate( 'Create Selected Test');
$this->params['breadcrumbs'][] = ['label' => translate( 'Selected Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="selected-test-create card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
