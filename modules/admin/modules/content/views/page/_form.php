<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 02 2024 08:16:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\tinymce\TinyMCE;
use app\modules\admin\enums\SidebarPosition;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\forms\PageForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model->model) ?>

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'content')->widget(
                        TinyMCE::class,
                        [
                            'presetPath' => '@app/config/tinymce.php',
                            'clientOptions' => [
                                'height' => 600,
                            ],
                        ]
                    ) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'status')->checkbox() ?>
            <?= $form->field($model, 'sidebar')->dropDownList(
                SidebarPosition::LABELS,
            ) ?>
            <div class="form-group pt-2">
                <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
