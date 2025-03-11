<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:36:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\telegram\searches\TelegramCompanySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="telegram-company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'bot_token') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'admin_ids') ?>

    <?php // echo $form->field($model, 'admin_url') ?>

    <?php // echo $form->field($model, 'channel_id') ?>

    <div class="form-group">
        <?= Html::submitButton(translate('Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(translate('Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
