<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 17:10:17
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

return [
    'class' => 'yii\db\Connection',
    'dsn' => env('DB_DSN'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', 'root'),
    'charset' => env('DB_CHARSET', 'utf8mb4'),

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
