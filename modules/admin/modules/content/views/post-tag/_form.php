<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:41:20
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\PostTag $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput([
                'placeholder' => 'tag1,  tag2, ...',
                'data-choices data-choices-text-unique-true' => ""
            ]) ?>
        </div>
    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
