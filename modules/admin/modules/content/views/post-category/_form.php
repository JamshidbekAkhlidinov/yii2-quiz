<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\models\PostCategory $model */
/** @var yii\widgets\ActiveForm $form */

$js = <<<JS
$('#post_image_input').change(function (e){
    $('#post_image').attr('src', e.target.value);
})
JS;

$this->registerJs($js);
?>

<div class="post-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 225]) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(
                InputFile::class,
                [
                    'clientRoute' => '/admin/file/default/input',
                    'options' => [
                        'id' => 'post_image_input',
                    ]
                ]
            ) ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'sub_text')->textarea(['rows' => 10]) ?>
        </div>

        <div class="col-md-6" style="padding-top: 26px">
            <img
                    src="<?= $model->image ?>"
                    alt=""
                    id="post_image"
                    style="width:100%;"
            >
        </div>

        <div class="col-md-12 pt-2">
            <?= $form->field($model, 'status')->checkbox() ?>
        </div>

    </div>
    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
