<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Question $model */

$this->title = translate('Create Question');
$this->params['breadcrumbs'][] = ['label' => translate('Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create">
    <div class="d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
