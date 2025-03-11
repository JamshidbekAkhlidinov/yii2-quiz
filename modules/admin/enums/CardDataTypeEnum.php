<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 7 2024 10:42:56
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\enums;

interface CardDataTypeEnum
{
    public const ISSUE = 1000;
    public const THEORY = 2000;

    public const LABELS = [
        self::ISSUE => "Issue",
        self::THEORY => "Theory"
    ];
}