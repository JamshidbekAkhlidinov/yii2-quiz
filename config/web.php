<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$assetManager = require __DIR__ . '/assetManager.php';
$mailer = require __DIR__ . '/_mailer.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'en',
    'layout' => 'velzon-horizantal',
    'name' => env('APP_NAME', "Yii2 basic"),
    'bootstrap' => ['log'],
    'homeUrl' => ['site/index'],
    'timeZone' => 'Asia/Kolkata',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => app\modules\admin\Module::class,
        ],
        'user' => [
            'class' => app\modules\user\Module::class,
        ],
        'restapi' => [
            'class' => app\modules\restapi\Module::class,
        ],
        'telegram' => [
            'class' => app\modules\telegram\Module::class,
        ],
    ],
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \yii\bootstrap5\LinkPager::class,
        ],
    ],
    'components' => [

        /*
        'authClientCollection' => [
            'class' => yii\authclient\Collection::class,
            'clients' => [
                'facebook' => [
                    'class' => yii\authclient\clients\Facebook::class,
                    'clientId' => env("facebook_client_id"),
                    'clientSecret' => env("facebook_client_secret"),
                ],
                'github' => [
                    'class' => yii\authclient\clients\GitHub::class,
                    'clientId' => env('github_client_id'),
                    'clientSecret' => env('github_client_secret'),
                ],
                'google' => [
                    'class' => yii\authclient\clients\Google::class,
                    'clientId' => env("google_client_id"),
                    'clientSecret' => env("google_client_secret"),
                ],
                'linkedin' => [
                    'class' => yii\authclient\clients\LinkedIn::class,
                    'clientId' => env("linkedin_client_id"),
                    'clientSecret' => env("linkedin_client_secret"),
                ],
                'twitter' => [
                    'class' => yii\authclient\clients\Twitter::class,
                    'attributeParams' => [
                        'include_email' => 'true'
                    ],
                    'consumerKey' => env("twitter_consumer_key"),
                    'consumerSecret' => env("twitter_consumer_secret"),
                ],
                'vkontakte' => [
                    'class' => yii\authclient\clients\VKontakte::class,
                    'clientId' => env("vkontakte_client_id"),
                    'clientSecret' => env("vkontakte_client_secret"),
                ],
            ],
        ],
        */

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'G2CNXQb7ZujvH1XA3taNXD0LCmyKTWn6',
            'baseUrl' => '/',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => '/site/error',
        ],
        'mailer' => $mailer,
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'assetManager' => $assetManager,
        'i18n' => [
            'translations' => [
                /*
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/modules/admin/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
                */
                'app*' => [
                    'class' => yii\i18n\DbMessageSource::class,
                    'sourceMessageTable' => '{{%i18n_source_message}}',
                    'messageTable' => '{{%i18n_message}}',
                ],
            ],
        ],
    ],
    'as locale' => [
        'class' => \app\modules\admin\behaviors\LocaleBehavior::class,
        'enablePreferredLanguage' => true,
        'cookieName' => 'lang',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'ustadev-uz' => dirname(__DIR__) . "/views/_gii/templates",
                ],
                'template' => 'ustadev-uz',
                'messageCategory' => 'app',
            ],
        ],
    ];
}

return $config;
