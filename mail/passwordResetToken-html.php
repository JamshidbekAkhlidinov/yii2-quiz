<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:48:59
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Follow the link below to reset your password:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>