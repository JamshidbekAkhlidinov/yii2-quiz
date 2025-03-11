<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 2 2024 15:6:33
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\enums;

interface SidebarPosition
{
    public const LEFT = 100;
    public const RIGHT = 200;
    public const HIDDEN = 300;
    public const LEFT_AND_RIGHT = 400;

    public const LABELS = [
        self::HIDDEN => "Hidden",
        self::LEFT => "Left",
        self::RIGHT => "Right",
        self::LEFT_AND_RIGHT => "Left and right",
    ];
}