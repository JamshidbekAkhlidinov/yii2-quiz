<?php
$db = require __DIR__ . '/db.php';


if (file_exists(__DIR__ . '/db_locale.php')) {
    $db = require __DIR__ . '/db_locale.php';
}

// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=localhost;dbname=yii2basic_test';

return $db;
