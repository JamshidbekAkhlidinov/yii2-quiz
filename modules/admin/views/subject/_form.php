<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:05:59
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Subject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="pt-2"></div>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group pt-2">
        <?= Html::submitButton(translate( 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
