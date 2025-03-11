<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:48:33
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Follow the link below to verify your email:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>