<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:10
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ProductForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use app\modules\admin\enums\ProductEnum;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Product form");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = ['label' => translate("Services"), 'url' => ['/admin/landingElement/service']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#product_icon_input').change(function (e){
    $('#product_icon').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, \yii\web\View::POS_END);

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="card">
        <div class="card-header">
            <h4><?= translate("Product Config") ?></h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->field($formModel, 'title'); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->field($formModel, 'sub_text'); ?>
                </div>

                <div class="col-md-4">
                    <?php echo $form->field($formModel, 'price'); ?>
                </div>

                <div class="col-md-3">
                    <?php echo $form->field($formModel, 'url'); ?>
                </div>

                <div class="col-md-3">
                    <?php echo $form->field($formModel, 'order'); ?>
                </div>

                <div class="col-md-3">
                    <?php echo $form->field($formModel, 'icon')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'product_icon_input',
                            ]
                        ]
                    );
                    ?>
                </div>
                <div class="col-md-3 align-items-center">
                    <?= Html::img($formModel->icon,
                        [
                            'width' => 50,
                            'id' => "product_icon",
                            'class' => '',
                            'style' => [
                                'object-fit' => 'cover',
                                'margin-top' => '30px'
                            ]
                        ]
                    ) ?>
                </div>

                <div class="col-md-6">
                    <?php echo $form->field($formModel, 'description')->textarea(['rows' => 5]); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($formModel, 'value')->textarea(['rows' => 5]); ?>
                </div>

                <div class="col-md-6">
                    <?php echo $form->field($formModel, 'chekout')->radioList(
                        array_map(
                            function ($label) {
                                return translate($label);
                            },
                            ProductEnum::LABELS
                        ),
                        [
                            'style' => 'display: flex; justify-content: start; gap: 13px;',
                        ],
                    ); ?>

                </div>

                <div class="card-footer">
                    <?php echo Html::submitButton(
                        translate("Save"),
                        ['class' => 'btn btn-primary']
                    ); ?>
                </div>
            </div>

        </div>
    </div>
<?php ActiveForm::end();




