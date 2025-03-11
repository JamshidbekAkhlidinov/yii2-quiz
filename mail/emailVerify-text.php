<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:48:47
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/** @var yii\web\View $this */
/** @var app\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
    Hello <?= $user->username ?>,

    Follow the link below to verify your email:

<?= $verifyLink ?>