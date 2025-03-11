<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 05 2024 12:30:39
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\I18nSourceMessage $model */

$this->title = translate('Create I18n Source Message');
$this->params['breadcrumbs'][] = ['label' => translate('I18n Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-source-message-create card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
