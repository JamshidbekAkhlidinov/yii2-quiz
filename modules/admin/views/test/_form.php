<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:06:40
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Test $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->dropDownList(
        ModelToData::getSubject(),
        [
            'prompt' => translate("--Select--"),
            'data-choices' => '',
            'data-choices-groups' => '',
        ]
    ) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'started_at')->input('datetime-local') ?>
    <?= $form->field($model, 'ended_at')->input('datetime-local') ?>


    <div class="pt-2"></div>

    <?= $form->field($model, 'status')->checkbox() ?>


    <div class="form-group pt-2">
        <?= Html::submitButton(translate( 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
