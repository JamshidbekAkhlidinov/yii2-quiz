<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 17:42:12
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\enums;

interface UserRolesEnum
{
    public const ROLE_USER = 'user';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_ADMINISTRATOR = 'webmaster';

    public const ALL = [
        self::ROLE_ADMINISTRATOR => "Administrator",
        self::ROLE_MANAGER => "Manager",
        self::ROLE_USER => "User",
    ];
}