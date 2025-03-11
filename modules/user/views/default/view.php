<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:24:21
 *   https://github.com/JamshidbekAkhlidinov
*/

/** @var yii\web\View $this */

/** @var app\modules\admin\models\UserTest $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => translate('User Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//$expiredDate = date('M d, Y H:i:s', strtotime($model->expired_at));
$expiredDate = date('Y/m/d H:i:s', strtotime($model->expired_at));

$css = <<<CSS
p{
    margin-top:1rem;
}
CSS;
$this->registerCss($css);

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
$this->registerJs($js,);
$js2 = <<<JS
function sendQuestionAnswer(test_id,question_id,answer_id) {
    let test = document.getElementById("tab_" + test_id)
    
    const checkboxes = document.querySelectorAll('input[name="answer[' + question_id + ']"]:checked');
    let selectedItems = [];

    checkboxes.forEach((checkbox) => {
        selectedItems.push(checkbox.value);
    });
    
    console.log(selectedItems);
    
    test.style.backgroundColor = "#3577f1"
    test.style.color = "white"
    $.ajax({
        data: {test_id, answer_id,selectedItems},
        type : "POST",
        url: '/user/default/send-answer',
        success : function(response){
            console.log(response)
        },
        error:function (response){
            console.log("Error ", response)
        }
    }) 
}

var countdownTime = new Date("$expiredDate").getTime();

var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countdownTime - now;

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("countdown").innerHTML =  "Qolgan vaqt: "+ hours + ":" + minutes + ":" + seconds + "";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").innerHTML = "Tugadi";
        alert("Vaqt tugadi");
        document.getElementById("test-save-form").submit();
    }

}, 1000);


JS;

$this->registerJs($js2, \yii\web\View::POS_BEGIN);

$form = ActiveForm::begin(['action' => ['default/save-answer', 'id' => $model->id], 'id' => 'test-save-form']);
?>
<input type="hidden" name="test_id" value="<?= $model->id ?>">
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h2 class="text-muted">
                <?= translate("Foydalanuvchi") ?>: <?= user()->identity->publicIdentity ?>
            </h2>
            <h4 id="countdown">
                Qolgan vaqt: 00:00:00
            </h4>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-border-top" role="tablist" id="myTab">
            <?php
            $tests = $model->userTestItems;
            foreach ($tests as $test):
                $question = $test->question;
                $selectedAnswerIds = json_decode($test->select_answer ?? "", true) ?? [];
                $answerCount = count($selectedAnswerIds)
                ?>
                <li class="nav-item border" role="presentation">
                    <a class="nav-link <?= ($test->order == 1) ? 'active' : '' ?>" data-bs-toggle="tab"
                       href="#test_<?= $test->id ?>" role="tab"
                       id="tab_<?= $test->id ?>"
                       aria-selected="<?= $test->order == 1 ?>"
                       style="<?= ($answerCount > 0) ? "background-color:#3577f1;color:white;" : "" ?>"
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
                                <?php $answers = $question->getAnswers()->orderBy('RAND()')->active()->all();
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

            <button type="submit" class="btn btn-primary" id="save-button">Save</button>
        </div>

    </div>
</div>

<?php ActiveForm::end() ?>

