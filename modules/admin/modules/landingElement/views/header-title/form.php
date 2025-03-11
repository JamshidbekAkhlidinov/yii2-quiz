<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\HeaderTitleForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\View;

$this->title = translate("Main Home Page Config");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

$js = <<<JS
$('#header_title_background_input').change(function (e){
    $('#header_title_background').attr('src', e.target.value);
    console.log(e.target.value);
})

$('#widget_image_input').change(function (e){
    $('#widget_image').attr('src', e.target.value);
    console.log(e.target.value);
})

$('#widget_icon_input').change(function (e){
    $('#widget_icon').attr('src', e.target.value);
    console.log(e.target.value);
})
JS;
$this->registerJs($js, View::POS_END);
?>

<?php $form = ActiveForm::begin(); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Main Home Page Config") ?></h3>
        <div>
            <?= Html::submitButton(
                translate("Save"),
                ['class' => 'btn btn-primary']
            );
            ?>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Home Page Title") ?></h3>
        <div style="padding-right: 15px">
            <?php echo $form->field($formModel, 'status')->checkbox(); ?>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $form->field($formModel, 'title');
                echo $form->field($formModel, 'description')->textarea(['rows' => 3]);
                ?>
            </div>

            <div class="col-md-6">
                <?php
                echo $form->field($formModel, 'background')->widget(
                    InputFile::class,
                    [
                        'clientRoute' => '/admin/file/default/input',
                        'options' => [
                            'id' => 'header_title_background_input',
                        ]
                    ]
                );
                echo Html::img($formModel->background, [
                    'width' => 130,
                    'id' => "header_title_background",
                ]);
                echo $form->field($formModel, 'order');


                ?>

            </div>
        </div>
    </div>
</div>


<!--Widget Title-->
<section>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3><?= translate("Widget Config") ?></h3>
            <div style="padding-right: 15px">
                <?php echo $form->field($formModel, 'widget_status')->checkbox(); ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <?php
                    echo $form->field($formModel, 'widget_title');
                    echo $form->field($formModel, 'widget_sub_text');
                    echo $form->field($formModel, 'widget_description')->textarea(['rows' => 5]);
                    echo $form->field($formModel, 'widget_order');
                    ?>
                </div>
                <div class="col-6">
                    <?php
                    echo $form->field($formModel, 'widget_image')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'widget_image_input',
                            ]
                        ]
                    );
                    echo Html::img($formModel->widget_image, [
                        'width' => 130,
                        'id' => "widget_image",
                    ]);
                    ?>

                    <?php
                    echo $form->field($formModel, 'widget_icon')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'widget_icon_input',
                            ]
                        ]
                    );
                    echo Html::img($formModel->widget_icon, [
                        'width' => 130,
                        'id' => "widget_icon",
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Create Title-->
<section>
    <div class="card position-relative py-2 bg-primary">
        <div class="bg-overlay bg-overlay-pattern opacity-50"></div>

        <div class="card-header d-flex justify-content-between"
             style="background: none; padding: 0; margin: 0; padding-left: 20px">
            <h3 style="color: white !important;"><?= translate("Create Title settings") ?></h3>
            <div style="padding-right: 15px; color: white !important;">
                <?php echo $form->field($formModel, 'create_status')->checkbox(); ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row" style="color: white !important;">
                <div class="col-6">
                    <?php
                    echo $form->field($formModel, 'create_title');
                    ?>
                </div>
                <div class="col-6">
                    <?php echo $form->field($formModel, 'create_url'); ?>
                </div>
                <div class="col-6">
                    <?php echo $form->field($formModel, 'create_order'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3><?= translate("Team Section Config") ?></h3>
            <div style="padding-right: 15px">
                <?php echo $form->field($formModel, 'team_status')->checkbox(); ?>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo $form->field($formModel, 'team_title');
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $form->field($formModel, 'team_button');
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $form->field($formModel, 'team_button_title');
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $form->field($formModel, 'team_order');
                    ?>
                </div>
                <div class="col-md-6">
                    <?php
                    echo $form->field($formModel, 'team_description')->textarea(['rows' => 3]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Question Title-->
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3><?= translate("Question Title Config") ?></h3>
                <div style="padding-right: 15px">
                    <?php echo $form->field($formModel, 'question_status')->checkbox(); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                echo $form->field($formModel, 'question_title');
                ?>
                <?php
                echo $form->field($formModel, 'question_description')->textarea(['rows' => 3]);
                ?>
                <?php
                echo $form->field($formModel, 'question_order');
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header  d-flex justify-content-between">
                <h3><?= translate("Product Config") ?></h3>
                <div style="padding-right: 15px">
                    <?php echo $form->field($formModel, 'product_status')->checkbox(); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                echo $form->field($formModel, 'product_title');
                ?>
                <?php
                echo $form->field($formModel, 'product_description')->textarea(['rows' => 3]);
                ?>
                <?php
                echo $form->field($formModel, 'product_order');
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3><?= translate("Service Title Settings") ?></h3>
                <div style="padding-right: 15px">
                    <?php echo $form->field($formModel, 'service_status')->checkbox(); ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?php
                        echo $form->field($formModel, 'service_title');
                        ?>
                        <?php
                        echo $form->field($formModel, 'service_description')->textarea(['rows' => 3]);
                        ?>
                        <?php
                        echo $form->field($formModel, 'service_order');
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3><?= translate("Process Config") ?></h3>
                <div style="padding-right: 15px">
                    <?php echo $form->field($formModel, 'process_status')->checkbox(); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                echo $form->field($formModel, 'process_title');
                ?>
                <?php
                echo $form->field($formModel, 'process_description')->textarea(['rows' => 3]);
                ?>
                <?php
                echo $form->field($formModel, 'process_order');
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3><?= translate("Statistic Section") ?></h3>
                <div style="padding-right: 15px">
                    <?php echo $form->field($formModel, 'statistic_status')->checkbox(); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                echo $form->field($formModel, 'statistic_order');
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3><?= translate("Opinion Section") ?></h3>
                <div style="padding-right: 15px">
                    <?php echo $form->field($formModel, 'opinion_status')->checkbox(); ?>
                </div>
            </div>
            <div class="card-body">
                <?php
                echo $form->field($formModel, 'opinion_order');
                ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>


