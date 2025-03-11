<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Test $model */

$this->title = translate( 'Update Test: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => translate( 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = translate( 'Update');
?>
<div class="test-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
