<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\tinymce\TinyMCE;
use app\modules\admin\models\ModelToData;
use unclead\multipleinput\MultipleInput;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\modules\admin\forms\QuestionForm $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJsFile("https://editor.codecogs.com/eqneditor.api.min.js");
$this->registerCssFile("https://editor.codecogs.com/eqneditor.css");

$this->registerJs(<<<JS
 window.onload = function () {
      textarea = EqEditor.TextArea.link('latexInput')
        .addOutput(new EqEditor.Output('output'))
        .addHistoryMenu(new EqEditor.History('history'));

      EqEditor.Toolbar.link('toolbar').addTextArea(textarea);
    }
    
    //Cross-browser function to select content
function SelectText(element) {
  var doc = document;
  if (doc.body.createTextRange) {
    var range = document.body.createTextRange();
    range.moveToElementText(element);
    range.select();
  } else if (window.getSelection) {
    var selection = window.getSelection();
    var range = document.createRange();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
  }
}
$(".copyable").click(function(e) {
  //Make the container Div contenteditable
  $(this).attr("contenteditable", true);
  //Select the image
  SelectText($(this).get(0));
  //Execute copy Command
  //Note: This will ONLY work directly inside a click listenner
  document.execCommand('copy');
  //Unselect the content
  window.getSelection().removeAllRanges();
  //Make the container Div uneditable again
  $(this).removeAttr("contenteditable");
  //Success!!
  alert("image copied!");
});
JS);


?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-md-9">

            <div class="card card-body">
                <div id="equation-editor">
                    <div id="history"></div>
                    <div id="toolbar"></div>
                    <div id="latexInput" placeholder="Write Equation here..."></div>
                    <div id="equation-output" class="copyable">
                        <img id="output">
                    </div>
                </div>
            </div>


            <div class="card card-body">

                <?= $form->errorSummary($model) ?>

                <?= $form->field($model, 'text')->widget(TinyMCE::className(), [
                    'presetPath' => '@app/config/tinymce.php',
                    'clientOptions' => [
                        'height' => 500,
                    ],
                ]) ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body">
                <?= $form->field($model, 'subject_id')->dropDownList(
                    ModelToData::getSubject(),
                    [
                        'prompt' => translate("--Select--"),
                        'disabled' => true,
                    ]
                ) ?>
                <?= $form->field($model, 'test_id')->dropDownList(
                    ModelToData::getTest(),
                    [
                        'prompt' => translate("--Select--"),
                        'disabled' => true,
                    ]
                ) ?>
                <div class="mt-3"></div>
                <?= $form->field($model, 'status')->checkbox() ?>
                <?= $form->field($model, 'ball')->textInput() ?>

                <div class="form-group pt-2">
                    <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card card-body">
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
                                'name' => 'answer_id',
                            ],
                            [
                                'title' => translate('Correct'),
                                'name' => 'correct_answer',
                                'type' => 'checkbox',
                            ],
                            [
                                'title' => translate('Text'),
                                'name' => 'text',
                                'type' => TinyMCE::class,
                                'options' => [
                                    'clientOptions' => [
                                        'toolbar' => 'bold italic | bullist numlist outdent indent | link image',
                                        'menubar' => false,  // Menubarni o'chirish
                                        'plugins' => [
                                            'code',
                                            'image',
                                            'media',
                                            'table'
                                        ],
                                        'height' => 300,
                                    ]
                                ]
                            ]
                        ]
                    ]
                ) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
