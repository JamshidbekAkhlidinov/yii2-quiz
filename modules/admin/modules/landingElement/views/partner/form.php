<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:10
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\PartnerForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Partner form");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = ['label' => translate("Partners"), 'url' => ['/admin/landingElement/partner']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#partner_file_input').change(function (e){
    $('#partner_file').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);

?>

<div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-12">
            <?php
            echo $form->field($formModel, 'logo')->widget(
                InputFile::class,
                [
                    'clientRoute' => '/admin/file/default/input',
                    'options' => [
                        'id' => 'partner_file_input',
                    ]
                ]
            );

            echo Html::img($formModel->logo, [
                'width' => 130,
                'id' => "partner_file",
            ]);
            ?>
        </div>

        <div class="col-12">
            <?php echo Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary mt-2']
            ); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>



