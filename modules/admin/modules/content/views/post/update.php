<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:40:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\forms\PostForm $model */

$this->title = translate("Post Update");
params()['breadcrumbs'][] = ['label' => translate("Posts"), 'url' => ['/admin/content/']];
params()['breadcrumbs'][] = $this->title;

$this->title = translate('Update Post: {name}', [
    'name' => $model->model->title,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model->title, 'url' => ['view', 'id' => $model->model->id]];
$this->params['breadcrumbs'][] = translate('Update');

?>

<div class="post-update">

    <div class="card card-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
