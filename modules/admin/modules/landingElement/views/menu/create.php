<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 02 2024 12:05:38
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\landingElement\models\Menu $model */

$this->title = translate('Create Menu');
$this->params['breadcrumbs'][] = ['label' => translate('Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">
    <div class="d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
