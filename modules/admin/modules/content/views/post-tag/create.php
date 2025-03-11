<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:41:20
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\PostTag $model */

$this->title = translate('Create Post Tag');
$this->params['breadcrumbs'][] = ['label' => translate('Post Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-tag-create card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
