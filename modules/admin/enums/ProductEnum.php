<?php

namespace app\modules\admin\enums;

interface ProductEnum
{
    public const MONTH = 10;

    public const YEAR = 15;

    public const LABELS = [
        self::MONTH => "Month",
        self::YEAR => "Year",
    ];
}