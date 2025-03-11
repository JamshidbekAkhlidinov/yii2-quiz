<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 07 2024 10:57:13
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\tinymce\TinyMCE;
use app\modules\admin\enums\CardDataTypeEnum;
use app\modules\admin\models\ModelToData;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\CardData $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'subject_id')->dropDownList(
                ModelToData::getSubject(),
                [
                    'prompt' => translate("--Select--"),
                ]
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'type')->dropDownList(
                CardDataTypeEnum::LABELS,
                [
                    'prompt' => translate("--Select--"),
                ]
            ) ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(TinyMCE::className(), [
                'presetPath' => '@app/config/tinymce.php',
                'clientOptions' => [
                    'height' => 500,
                ],
            ]) ?>
        </div>
    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
