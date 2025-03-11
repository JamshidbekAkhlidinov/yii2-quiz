<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 07 2024 16:53:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Card $model */

$this->title = translate('Create Card');
$this->params['breadcrumbs'][] = ['label' => translate('Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-create card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
