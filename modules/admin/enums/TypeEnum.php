<?php

namespace app\modules\admin\enums;

interface TypeEnum
{
    public const PAGE = 44;
    public const LINK = 55;
    public const CATEGORY = 66;
    public const POST = 77;


    public const LABELS = [
        self::PAGE => "Page",
        self::LINK => "Link",
        self::CATEGORY => "Category",
        self::POST => "Post",
    ];

    public const ALL = [
        self::PAGE => "Page",
        self::LINK => "Link",
        self::CATEGORY => "Category",
        self::POST => "Post",
    ];

    public const COLORS = [
        self::PAGE => "bg-success",
        self::LINK => "bg-success",
        self::CATEGORY => "bg-success",
        self::POST => "bg-success",
    ];
}