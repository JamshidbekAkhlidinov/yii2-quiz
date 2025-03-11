<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use alexantr\elfinder\InputFile;
use app\modules\admin\enums\MenuLabelView;
use app\modules\admin\enums\PositionMenuEnum;
use app\modules\admin\enums\TypeEnum;
use app\modules\admin\modules\landingElement\models\DataToArray;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\forms\MenuForm $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #e9e9e9">
                    <h4><?= translate("Main menu information") ?></h4>
                </div>
                <div class="card-body">

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'type')->dropDownList(
                        TypeEnum::LABELS,
                        [
                            'id' => 'type',
                        ],

                    )->label(false); ?>

                    <?= $form->field($model, 'item')->widget(DepDrop::class, [
                        'data' => !empty($model->type) ? DataToArray::getListMenu($model->type) : [],
                        'pluginOptions' => [
                            'depends' => ['type'],
                            'placeholder' => translate('--Select--'),
                            'url' => Url::to('/admin/landingElement/menu/list')
                        ],
                        'type' => DepDrop::TYPE_SELECT2,
                        'select2Options' => [
                            'maintainOrder' => true,
                            'pluginOptions' => [
                                'tags' => true,
                                'allowClear' => true
                            ]
                        ],
                    ]) ?>

                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #e9e9e9">
                    <h4><?= translate("Other settings") ?></h4>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'position_menu')->dropDownList(PositionMenuEnum::LABELS) ?>
                    <?= $form->field($model, 'parent_id')->widget(Select2::class, [
                        'data' => DataToArray::getParentMenu($model->model->id),
                        'options' => [
                            'placeholder' => translate('--Select--')
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                    <?= $form->field($model, 'order')->textInput() ?>
                    <?= $form->field($model, 'label_position')->dropDownList(MenuLabelView::LABELS) ?>
                    <?= $form->field($model, 'status')->checkbox() ?>
                    <?= $form->field($model, 'icon')->widget(
                        InputFile::class,
                        [
                            'clientRoute' => '/admin/file/default/input',
                            'options' => [
                                'id' => 'menu_icon_input',
                            ]
                        ]
                    ); ?>


                </div>
            </div>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(translate('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
