<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:05:59
 *   https://github.com/JamshidbekAkhlidinov
*/

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Subject $model */

$this->title = translate( 'Create Subject');
$this->params['breadcrumbs'][] = ['label' => translate( 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
