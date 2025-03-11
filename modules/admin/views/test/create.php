<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Test $model */

$this->title = translate( 'Create Test');
$this->params['breadcrumbs'][] = ['label' => translate( 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
