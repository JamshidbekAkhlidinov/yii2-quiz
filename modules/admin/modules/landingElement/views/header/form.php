<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\HeaderForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Site Config");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#header_logo_input').change(function (e){
    $('#header_logo').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>

<?php $form = ActiveForm::begin(); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Site Config") ?></h3>
        <div>
            <?= Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary']
            );
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <?php
                echo $form->field($formModel, 'title');
                echo $form->field($formModel, 'description')->textarea();
                ?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex flex-column">
                <?php
                echo $form->field($formModel, 'logo')->widget(
                    InputFile::class,
                    [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'header_logo_input',
                        ]
                    ]
                );
                echo Html::img($formModel->logo, [
                    'width' => 130,
                    'id' => "header_logo",
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


