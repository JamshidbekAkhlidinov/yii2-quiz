<?php

/**
 * @var View $this
 */

use app\models\User;
use app\modules\admin\models\CardAssigned;
use app\modules\admin\models\Question;
use app\modules\admin\models\Subject;
use app\modules\admin\models\Test;
use app\modules\admin\models\UserTest;
use app\widgets\CardWidget;
use yii\web\View;

$this->title = translate("Admin dashboard");
Yii::$app->params['breadcrumbs'][] = $this->title;
?>

<div class="row">

    <?= CardWidget::widget([
        'title' => translate("Users"),
        'count' => User::find()->count(),
    ]) ?>

    <?= CardWidget::widget([
        'title' => translate("Subjects"),
        'count' => Subject::find()->count(),
    ]) ?>


    <?= CardWidget::widget([
        'title' => translate("Tests"),
        'count' => Test::find()->count(),
    ]) ?>


    <?= CardWidget::widget([
        'title' => translate("Questions"),
        'count' => Question::find()->count(),
    ]) ?>

    <?= CardWidget::widget([
        'title' => translate("Attempts"),
        'count' => UserTest::find()->count(),
    ]) ?>

    <?= CardWidget::widget([
        'title' => translate("Cards"),
        'count' => CardAssigned::find()->count(),
    ]) ?>


</div> <!-- end row-->
