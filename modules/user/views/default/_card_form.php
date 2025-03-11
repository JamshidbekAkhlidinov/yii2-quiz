<?php
/*
 *   Jamshidbek Akhlidinov
 *   7 - 8 2024 12:43:36
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $model \app\modules\user\forms\UserCardForm
 */

use app\modules\admin\models\ModelToData;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$form = ActiveForm::begin();

echo $form->field($model, 'subject_id')->dropDownList(
    ModelToData::getSubject(),
    [
        'prompt' => translate("--Select--"),
    ]
);
?>

    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

<?php
ActiveForm::end();
?>