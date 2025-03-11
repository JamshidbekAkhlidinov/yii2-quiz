<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:37:42
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TelegramBotUser $model */

$this->title = translate('Create Telegram Bot User');
$this->params['breadcrumbs'][] = ['label' => translate('Telegram Bot Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telegram-bot-user-create card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="card-header">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
