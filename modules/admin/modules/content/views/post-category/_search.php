<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 11:42:01
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\content\search\PostCategorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'sub_text') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(translate('Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(translate('Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
