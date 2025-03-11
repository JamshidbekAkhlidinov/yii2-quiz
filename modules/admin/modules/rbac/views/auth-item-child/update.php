<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\models\AuthItemChild $model */

$this->title = translate('Update Auth Item Child: {name}', [
    'name' => $model->parent,
]);
$this->params['breadcrumbs'][] = ['label' => translate('Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = translate('Update');
?>
<div class="auth-item-child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
