<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 2 2024 17:31:17
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\enums;

interface AuthItemTypeEnum
{
    public const ROLE = 1;
    public const PERMISSION = 2;

    public const ALL = [
        self::ROLE => "Role",
        self::PERMISSION => "Permission",
    ];

}