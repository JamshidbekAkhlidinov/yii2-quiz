<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\models\AuthItemChild $model */

$this->title = translate('Create Auth Item Child');
$this->params['breadcrumbs'][] = ['label' => translate('Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
