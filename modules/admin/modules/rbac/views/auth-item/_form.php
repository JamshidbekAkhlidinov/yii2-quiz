<?php

use app\modules\admin\enums\UserRolesEnum;
use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\models\AuthItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'type')->radioList(
        [1 => 'Role', 2 => 'Permission'],
        [
            'value' => $model->isNewRecord ? 1 : $model->type,
        ]
    ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
//        $form->field($model, 'rule_name')->dropDownList(
//            ModelToData::getAuthRule()
//        ) ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
