<?php
/*
 *   Jamshidbek Akhlidinov
 *   10 - 3 2025 16:5:25
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var \app\modules\admin\forms\UploadDocumentForm $model
 */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = translate('Import data');
Yii::$app->params['breadcrumbs'][] = $this->title;
?>

<div class="card">

    <div class="card-header">
        <?= Html::a(
            translate('Back'),
            ['test/index'],
            ['class' => 'btn btn-info']
        ) ?>
    </div>

    <div class="card-body">
        <div class="alert alert-info">
            Bu yerda siz excel dagi savollaringizni bazaga import qilishingiz va
            undan so'ng biletlar yaratishingiz mumkun.
            <br>
            <b>Excel formati quyidagicha:</b>
            <a href="<?= Yii::getAlias("@web/docs/example.xlsx") ?>" style="font-weight: 700">File</a>
        </div>

        <?php
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

        echo '<div class="pt-2"></div>';

        echo $form->field($model, 'file')->fileInput();

        echo Html::submitButton('Upload', ['class' => 'btn btn-primary']);

        ActiveForm::end();

        ?>
    </div>

</div>

