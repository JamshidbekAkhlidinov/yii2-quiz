<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 7 2024 16:15:43
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\enums;

interface TestResultStatusEnum
{
    public const ACTIVE = 1;
    public const FAIL = 100;
    public const SUCCESS = 200;

    public const ALL = [
        self::ACTIVE => "Active",
        self::FAIL => "Failed",
        self::SUCCESS => "Success"
    ];

    public const COLORS = [
        self::ACTIVE => "bg-success",
        self::FAIL => "bg-danger",
        self::SUCCESS => "bg-success",
    ];
}