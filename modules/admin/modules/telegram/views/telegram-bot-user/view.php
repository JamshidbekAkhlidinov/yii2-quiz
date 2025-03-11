<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:37:42
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TelegramBotUser $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => translate('Telegram Bot Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="telegram-bot-user-view card">
    <div class="card-header d-flex justify-content-between">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
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
            'telegram_company_id',
            'telegram_user_id',
            'username',
            'phone_number',
            'balance',
            'is_admin',
            'is_block',
            'step',
            'full_name',
            'options:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>
