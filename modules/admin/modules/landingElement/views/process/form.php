<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:10
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $formModel app\modules\admin\modules\landingElement\forms\ProcessForm
 * @var $this yii\web\View
 */

use alexantr\elfinder\InputFile;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = translate("Process form");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = ['label' => translate("Services"), 'url' => ['/admin/landingElement/process']];
params()['breadcrumbs'][] = $this->title;
?>

<div>
        <?php
        $form = ActiveForm::begin();

        echo $form->field($formModel, 'icon')->widget(
            InputFile::class,
            [
                'clientRoute' => '/admin/file/default/input',
            ]
        );
        echo $form->field($formModel, 'title');
        echo $form->field($formModel, 'description')->textarea(['rows' => 3]);

        echo Html::submitButton(
            translate("Save"),
            ['class' => 'btn btn-primary']
        );

        ActiveForm::end();
        ?>
</div>



