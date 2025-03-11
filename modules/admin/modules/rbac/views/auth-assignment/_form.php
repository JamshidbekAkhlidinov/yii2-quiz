<?php

use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\models\AuthAssignment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->dropDownList(
        ModelToData::getAuthItems(),
        [
            'prompt' => translate("--Select--")
        ]
    ) ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ModelToData::getUsers(),
        [
            'prompt' => translate("--Select--")
        ]
    ) ?>

    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
