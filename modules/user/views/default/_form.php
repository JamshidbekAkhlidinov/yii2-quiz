<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 06 2024 11:24:21
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\ModelToData;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Tabs;
use yii\helpers\Html;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var \app\modules\user\forms\UserTestForm $model */
/** @var yii\widgets\ActiveForm $form */

$select = translate("--Select--");
$this->registerJs(<<<JS
function populateSelectOptions(selectElement, data) {
    const select = document.createElement('option');
    select.text = "$select";
    selectElement.appendChild(select);
    for (const key in data) {
        if (data.hasOwnProperty(key)) {
            const option = document.createElement('option');
            option.value = key;
            option.text = data[key];
            selectElement.appendChild(option);
        }
    }
}
JS, \yii\web\View::POS_END);
?>

<div class="user-test-form">

    <?php $form = ActiveForm::begin();

    $inputs[] = $form->field($model, 'subject_id')->dropDownList(
        ModelToData::getSubject(),
        [
            'prompt' => translate("--Select--"),
            'onchange' => new JsExpression(
                <<<JS
                $.ajax({
                        url: '/user/default/test',
                        type: 'GET',
                        data: {
                            subject_id: $(this).val()
                        },
                        success: function (data) {
                            var selectedElement = document.getElementById('test_id');
                            if(selectedElement){
                                selectedElement.innerHTML = '';
                            }
                            populateSelectOptions(selectedElement,data)
                        }
                    })
                JS
            ),
        ]
    );
    $inputs[] = $form->field($model, 'test_id')->dropDownList(
        $model->subject_id ? ModelToData::getTest($model->subject_id) : [],
        [
            'prompt' => translate("--Select--"),
            'id' => 'test_id',
        ]
    );
    echo Tabs::widget([
        'items' => [
            [
                'label' => translate("Subject tests"),
                'content' => implode("", $inputs),
            ],
            [
                'label' => translate("Selected tests"),
                'content' => $form->field($model, 'selected_test_id')->dropDownList(
                    ModelToData::getSelectedTest(),
                    [
                        'prompt' => translate("--Select--")
                    ]
                ),
            ],
        ],
    ]);
    ?>

    <div class="form-group pt-2">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
