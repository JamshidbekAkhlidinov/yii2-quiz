<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 06 2024 12:49:46
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\SelectedTest $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => translate( 'Selected Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
function copyToClipboard() {
    // Nusxa olinadigan URLni tugmaning 'data-url' atributidan olamiz
    var url = document.getElementById("copy-link-btn").getAttribute("data-url");

    // Vaqtinchalik input yarating
    var tempInput = document.createElement("input");
    document.body.appendChild(tempInput);
    tempInput.value = url;
    
    // URL ni tanlash va clipboardga nusxalash
    tempInput.select();
    document.execCommand("copy");
    
    // Inputni olib tashlaymiz
    document.body.removeChild(tempInput);

    // Foydalanuvchiga xabar chiqarish (masalan, alert yoki toast)
    alert("Link nusxalandi: " + url);
}
JS, \yii\web\View::POS_HEAD
);
?>
<div class="selected-test-view card">
    <div class="card-header d-flex justify-content-between">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::button(
                'CopyLink',
                [
                    'class' => 'btn btn-primary',
                    'id' => 'copy-link-btn',
                    'onclick' => 'copyToClipboard()',
                    'data-url' => Yii::$app->urlManager->createAbsoluteUrl([
                        '/user/default/create',
                        'selected_test_id' => Yii::$app->request->get('id'),
                    ])
                ]
            ) ?>
        <?= Html::a(translate( 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(translate( 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => translate( 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
    <div class="card-header">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>
    </div>
</div>
