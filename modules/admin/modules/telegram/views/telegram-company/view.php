<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:36:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TelegramCompany $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => translate('Telegram Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="telegram-company-view card">
    <div class="card-header d-flex justify-content-between">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(
            translate('Set Webhook'), ['webhook', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'target' => '_blank',
            'data' => [
                'confirm' => translate('Are you sure you want to set web hook bot?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(translate('Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(translate('Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => translate('Are you sure you want to delete this item?'),
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
            'bot_token',
            'status',
            'admin_ids',
            'admin_url:url',
            'channel_id',
        ],
    ]) ?>
    </div>
</div>
