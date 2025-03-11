<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:37:42
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\telegram\searches\TelegramBotUserSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telegram-bot-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'telegram_company_id') ?>

    <?= $form->field($model, 'telegram_user_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'balance') ?>

    <?php // echo $form->field($model, 'is_admin') ?>

    <?php // echo $form->field($model, 'is_block') ?>

    <?php // echo $form->field($model, 'step') ?>

    <?php // echo $form->field($model, 'full_name') ?>

    <?php // echo $form->field($model, 'options') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(translate('Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(translate('Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
