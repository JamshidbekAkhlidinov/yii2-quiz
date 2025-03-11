<?php

namespace app\modules\admin\enums;

interface PositionMenuEnum
{
    public const HEADER = 100;
    public const TOP = 200;

    public const FOOTER_LINKS = 300;
    public const FOOTER_EXPLORE = 400;

    public const SIDEBAR_1 = 500;
    public const SIDEBAR_2 = 600;

    public const ALL = 0;

    public const LABELS = [
        self::ALL => "All",
        self::HEADER => "Header menu",
        self::TOP => "Top menu",
        self::SIDEBAR_1 => "Sidebar 1",
        self::SIDEBAR_2 => "Sidebar 2",
        self::FOOTER_LINKS => "Footer Links",
        self::FOOTER_EXPLORE => "Footer Additional",
    ];

    public const BG_COLORS = [
        self::ALL => "#f7b888",
        self::HEADER => "#f7b84b",
        self::TOP => "#f06548",
        self::SIDEBAR_1 => "#299cdb",
        self::SIDEBAR_2 => "#405189",
        self::FOOTER_LINKS => "#299cdb",
        self::FOOTER_EXPLORE => "#6559cc",
    ];


}