<?php

namespace app\modules\admin\enums;

interface MenuLabelView
{

    public const LABEL = 11;
    public const ICON = 22;
    public const ICON_LABEL = 33;

    public const LABELS = [
        self::LABEL=> "Title",
        self::ICON=> "Icon",
        self::ICON_LABEL=> "Icon and Title",
    ];
}