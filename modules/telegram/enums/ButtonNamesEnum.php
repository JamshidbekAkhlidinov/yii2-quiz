<?php
/*
 *  Jamshidbek Akhlidinov
 *   27 - 4 2024 18:55:5
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\enums;

interface ButtonNamesEnum
{
    public const change_language = 'change_language';
    public const back_menu = 'back_menu';

    public const menuList = [
        self::change_language,
    ];

    public const forward_menu = 'forward_menu';
    public const cancel_forward = 'cancel_forward';
    public const logout_admin = 'logout_admin';

    public const adminMenuList = [
        self::forward_menu,
        self::logout_admin,
    ];

}