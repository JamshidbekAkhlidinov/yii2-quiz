<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 06 2024 12:49:46
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\ModelToData;
use app\modules\admin\widgets\input\NumberInput;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\modules\admin\forms\SelectedTestForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="selected-test-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 mt-2">
            <?= $form->field($model, 'status')->checkbox() ?>
        </div>

        <div class="col-md-12 mt-2">
            <?= $form->field($model, 'items')->widget(
                MultipleInput::class,
                [
                    'iconSource' => MultipleInput::ICONS_SOURCE_FONTAWESOME,
                    'min' => 1,
                    'max' => 10,
                    'columns' => [
                        [
                            'type' => 'hiddenInput',
                            'name' => 'subject_id',
                        ],
                        [
                            'title' => translate("Subject"),
                            'type' => 'dropdownList',
                            'name' => 'subject_id',
                            'items' => ModelToData::getSubject(),
                            'options' => [
                                'prompt' => translate("--Select--")
                            ]
                        ],
                        [
                            'title' => translate("Count"),
                            'type' => NumberInput::class,
                            'name' => 'count',
                            'options' => [
                                'options' => [
                                    'class' => 'form-control'
                                ]
                            ]
                        ]
                    ]
                ]
            )->label(false) ?>
        </div>

    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate( 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
