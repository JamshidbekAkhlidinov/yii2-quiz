<?php

use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\modules\rbac\models\AuthItemChild $model
 * @var yii\widgets\ActiveForm $form
 * @var $parent
 * */

?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model) ?>
    <?php
    if ($parent) {
        echo $form->field($model, 'parent')->hiddenInput(['value' => $parent])->label(false);
    } else {
        echo $form->field($model, 'parent')->dropDownList(
            ModelToData::getAuthItems(),
            [
                'prompt' => translate('--Select--'),
            ]
        );
    }

    ?>

    <?= $form->field($model, 'child')->dropDownList(
        ModelToData::getAuthItems(),
        [
            'prompt' => translate('--Select--')
        ]
    ) ?>

    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
