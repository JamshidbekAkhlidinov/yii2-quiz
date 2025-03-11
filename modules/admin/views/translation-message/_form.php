<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 05 2024 12:30:39
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\LanguageEnum;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\forms\MessageForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="i18n-source-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'message')->textarea(['rows' => 2]) ?>
    <?php
    foreach (LanguageEnum::LABELS as $key => $value) {
        echo $form
            ->field($model, 'items[' . $key . ']')
            ->textarea(['rows' => 2])
            ->label($value);
    }
    ?>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
