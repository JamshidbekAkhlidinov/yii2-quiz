<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\search\AuthItemChildSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-item-child-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'child') ?>

    <div class="form-group">
        <?= Html::submitButton(translate('Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(translate('Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
