<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:24:21
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\user\search\UserTestSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-test-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'test_id') ?>

    <?= $form->field($model, 'selected_test_id') ?>

    <?php // echo $form->field($model, 'total_ball') ?>

    <?php // echo $form->field($model, 'solve_ball') ?>

    <?php // echo $form->field($model, 'total_count') ?>

    <?php // echo $form->field($model, 'solve_count') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'expired_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(translate('Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(translate('Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
