<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:49:17
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/** @var yii\web\View $this */
/** @var app\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);

?>
Hello <?= $user->username ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
