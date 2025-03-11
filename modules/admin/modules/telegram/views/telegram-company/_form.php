<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:36:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TelegramCompany $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telegram-company-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'bot_token')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'admin_ids')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'admin_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'channel_id')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
