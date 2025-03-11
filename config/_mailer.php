<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 2 2024 17:6:0
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */


use yii\swiftmailer\Mailer;

return [
    'viewPath' => '@app/mail',
    'class' => Mailer::class,
    'useFileTransport' => false,
    'messageConfig' => [
        'from' => [
            env("MAIL_FROM_EMAIL") => env("MAIL_FROM_NAME")
        ],
        'charset' => 'UTF-8',
    ],
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => env("MAIL_HOST"),
        'username' => env("MAIL_FROM_EMAIL"),
        'password' => env("MAIL_PASSWORD"),
        'port' => 587,
        'encryption' => 'tls',
    ],
];