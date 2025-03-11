<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 07 2024 16:53:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\enums\CardDataTypeEnum;
use app\modules\admin\models\ModelToData;
use app\modules\admin\widgets\input\NumberInput;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Card $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'subject_id')->dropDownList(
                ModelToData::getSubject(),
                [
                    'prompt' => translate("--Select--"),
                ]
            )->label(translate('Subject')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(translate('Name')) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'count')->textInput()->label(translate('Count')) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'university')->textInput(['maxlength' => true])->label(translate('University')) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'faculty')->textInput(['maxlength' => true])->label(translate('Faculty')) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'department')->textInput(['maxlength' => true])->label(translate('Department')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'education_direction')->textInput(['maxlength' => true])->label(translate('Education direction')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'specialty')->textInput(['maxlength' => true])->label(translate('Specialty')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'creator')->textInput(['maxlength' => true])->label(translate('Creator')) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'department_head')->textInput(['maxlength' => true])->label(translate('Department head')) ?>
        </div>


        <div class="col-md-12">
            <?= $form->field($model, 'items')->widget(
                MultipleInput::className(), [
                    'max' => 10,
                    'min' => 1, // should be at least 2 rows
                    'allowEmptyList' => false,
                    'enableGuessTitle' => true,
                    'addButtonPosition' => MultipleInput::POS_HEADER,
                    'iconSource' => MultipleInput::ICONS_SOURCE_FONTAWESOME,
                    'columns' => [
                        [
                            'type' => 'hiddenInput',
                            'name' => 'card_item_id',
                        ],
                        [
                            'title' => translate('Type'),
                            'name' => 'type',
                            'type' => 'dropdownList',
                            'items' => array_map(function ($item) {
                                return translate($item);
                            },CardDataTypeEnum::LABELS)
                        ],
                        [
                            'title' => translate('Count'),
                            'name' => 'count',
                            'type' => NumberInput::class,
                            'options' => [
                                'options' => [
                                    'class' => 'form-control',
                                ]
                            ]
                        ],
                    ]
                ]
            ) ?>
        </div>

    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
