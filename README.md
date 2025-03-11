<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](https://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/ustadev/yii2basic.svg)](https://packagist.org/packages/ustadev/yii2basic)
[![Total Downloads](https://img.shields.io/packagist/dt/ustadev/yii2basic.svg)](https://packagist.org/packages/ustadev/yii2basic)
[![wakatime](https://wakatime.com/badge/user/d3110f77-d926-4238-8cdc-a8991b6685c0/project/018bf14f-2399-4fc4-865a-8d0f8cceccab.svg)](https://wakatime.com/badge/user/d3110f77-d926-4238-8cdc-a8991b6685c0/project/018bf14f-2399-4fc4-865a-8d0f8cceccab)

[//]: # ([![build]&#40;https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg&#41;]&#40;https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild&#41;)

DIRECTORY STRUCTURE
-------------------

    - yii2basic
    |
    |-----assets/             contains assets definition
    |----- commands/           contains console commands (controllers)
    |----- config/             contains application configurations
    |----- controllers/        contains Web controller classes
    |----- mail/               contains view files for e-mails
    |----- models/             contains model classes
    |----- modules/            contains admin module and others modules
    |          |- admin/        admin module
    |          |  |- modules/
    |              |-- content/             post,page,post category
    |              |-- file/                file management
    |              |-- landing element/     frontend view management
    |              |-- rbac/
    |          |- restapi/       rest api module
    |              modules/
    |                  v1/
    |----- runtime/            contains files generated during runtime
    |----- tests/              contains various tests for the basic application
    |----- vendor/             contains dependent 3rd-party packages
    |----- views/              contains view files for the Web application
          web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project ustadev/yii2basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](https://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

 `config/db.php` copy `config/db_locale.php` and setting this file

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => 'rooot',
    'charset' => 'utf8mb4',
];
```
or `.env.dist` file copy `.env` file and settings

```dotenv
YII_DEBUG="true"
YII_ENV="dev"

APP_NAME="Admin Panel"

DB_DSN="mysql:host=localhost;dbname=yii2basic"
DB_USERNAME="root"
DB_PASSWORD="root"
DB_CHARSET="utf8mb4"


BOT_TOKEN="token"

MAIL_FROM_EMAIL="mail@gmail.com"
MAIL_FROM_NAME="Name"
MAIL_HOST="smtp.gmail.com"
MAIL_PASSWORD="password"
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


### Runing project
~~~   
php yii serve
~~~
~~~   
php8.1 yii serve
~~~

# new_test_application
# yii2-quiz
