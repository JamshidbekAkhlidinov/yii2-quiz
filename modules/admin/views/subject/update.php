<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:05:59
 *   https://github.com/JamshidbekAkhlidinov
*/

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Subject $model */

$this->title = translate( 'Update Subject: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => translate( 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = translate( 'Update');
?>
<div class="subject-update ">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
