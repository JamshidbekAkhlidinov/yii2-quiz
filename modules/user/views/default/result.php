<?php
/*
 *   Jamshidbek Akhlidinov
 *   2 - 7 2024 1:18:6
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $model \app\modules\admin\models\UserTest
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$js = <<<JS
var tabs = document.querySelectorAll('#myTab .nav-link');

function activateTab(index) {
    var tabTrigger = new bootstrap.Tab(tabs[index]);
    tabTrigger.show();
}

function getActiveTabIndex() {
    for (var i = 0; i < tabs.length; i++) {
        if (tabs[i].classList.contains('active')) {
            return i;
        }
    }
    return -1;
}

document.getElementById('prevBtn').addEventListener('click', function () {
    var activeIndex = getActiveTabIndex();
    if (activeIndex > 0) {
        activateTab(activeIndex - 1);
    }
});

document.getElementById('nextBtn').addEventListener('click', function () {
    var activeIndex = getActiveTabIndex();
    if (activeIndex < tabs.length - 1) {
        activateTab(activeIndex + 1);
    }
});
JS;
$this->registerJs($js);
?>

<div class="card card-body">
    <h2><?= translate("Solve ball") ?>: <span style="color:red"><?= $model->solve_ball; ?></span> ball</h2>
    <h2><?= translate("Solve count") ?>: <span style="color:red"><?= $model->solve_count; ?></span> ta</h2>
    <h2><?= translate("Total ball") ?>: <span style="color:red"><?= $model->total_ball; ?></span> ball</h2>
    <h2><?= translate("Total count") ?>: <span style="color:red"><?= $model->total_count; ?></span> ta</h2>
    <h2><?= translate("Percentage") ?>: <span
                style="color:red"><?= ($model->solve_ball * 100) / $model->total_ball . "%"; ?></span></h2>
</div>

<?php

$form = ActiveForm::begin();
?>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h2 class="text-muted">
                <?= translate("Foydalanuvchi") ?>: <?= user()->identity->publicIdentity ?>
            </h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-border-top" role="tablist" id="myTab">
            <?php
            $tests = $model->userTestItems;
            foreach ($tests as $test):
                $question = $test->question;
                if ($test->is_true) {
                    $color = "green";
                } else {
                    $color = "red";
                }
                $selectedAnswerIds = json_decode($test->select_answer ?? "", true) ?? [];
                ?>
                <li class="nav-item border" role="presentation">
                    <a class="nav-link <?= ($test->order == 1) ? 'active' : '' ?>" data-bs-toggle="tab"
                       href="#test_<?= $test->id ?>" role="tab"
                       id="tab_<?= $test->id ?>"
                       aria-selected="<?= $test->order == 1 ?>"
                       style="<?= "background-color:$color;color:white;" ?>"
                    >
                        <?= $test->order ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul><!-- Tab panes -->
        <div class="tab-content text-muted">
            <?php
            foreach ($tests as $test):
                $question = $test->question;
                ?>
                <div class="tab-pane <?= ($test->order == 1) ? 'active show' : '' ?>" id="test_<?= $test->id ?>"
                     role="tabpanel">
                    <div class="alert alert-primary alert-dismissible alert-additional fade show" role="alert">
                        <div class="alert-content">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h5 class="alert-heading">
                                        <?= $question->text ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="alert-body p-0 ">
                            <div class="btn-group-vertical w-100" role="group"
                                 aria-label="Vertical radio toggle button group">
                                <?php $answers = $question->getAnswers()->active()->all();
                                $selectedAnswerIds = json_decode($test->select_answer ?? "", true) ?? [];
                                $sum = array_sum(array_column($answers, 'correct_answer'));
                                $type = 'radio';
                                if ($sum > 1) {
                                    $type = 'checkbox';
                                }
                                foreach ($answers as $answer):
                                    /**
                                     * @var $answer \app\modules\admin\models\Answer
                                     */
                                    echo Html::input(
                                            $type,
                                            "answer[$question->id]",
                                            $answer->id,
                                            [
                                                'class' => 'btn-check',
                                                'readonly' => false,
                                                'disabled' => true,
                                                'id' => "vbtn-radio{$answer->id}",
                                                'checked' => in_array($answer->id, $selectedAnswerIds),
                                                'onchange' => "sendQuestionAnswer(" . $test->id . "," . $question->id . "," . $answer->id . ")"
                                            ]
                                        ) . "\n";
                                    echo Html::tag('label', $answer->text . " - " . $answer->correct_answer,
                                            [
                                                'for' => "vbtn-radio{$answer->id}",
                                                'class' => 'btn btn-outline-secondary w-100',
                                                'style' => 'text-align:left'
                                            ]) . "\n";
                                endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="card-footer">

        <div class="d-flex justify-content-between">
            <div class="div">
                <button id="prevBtn" type="button" class="btn btn-primary">Previous</button>
                <button id="nextBtn" type="button" class="btn btn-primary">Next</button>
            </div>

        </div>

    </div>
</div>

<?php ActiveForm::end() ?>

