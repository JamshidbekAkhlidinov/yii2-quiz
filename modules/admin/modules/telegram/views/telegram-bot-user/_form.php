<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:37:42
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TelegramBotUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telegram-bot-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'telegram_company_id')->dropDownList(
                ModelToData::getTelegramCompany(),
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'telegram_user_id')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'balance')->input('number') ?>
        </div>
        <div class="col-md-12 pt-2">
            <?= $form->field($model, 'is_admin')->checkbox() ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'is_block')->checkbox() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'step')->input('number') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'options')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
