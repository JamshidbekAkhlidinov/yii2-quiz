<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:54:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ContactForm
 * @var $this yii\web\View
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Contact Config");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3><?= translate("Contact Config") ?></h3>
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header ">
                <?php
                echo $form->field($formModel, 'title');
                echo $form->field($formModel, 'description')->textarea(['rows' => 5]);
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header d-flex flex-column">
                <?php echo $form->field($formModel, 'sub_text')->textarea(['rows' => 2]) ?>
                <?php echo $form->field($formModel, 'work_order')->textarea(['rows' => 4]); ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


