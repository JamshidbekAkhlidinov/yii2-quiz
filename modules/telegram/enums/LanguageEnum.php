<?php
/*
 *  Jamshidbek Akhlidinov
 *   6 - 5 2024 19:32:58
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\enums;

interface LanguageEnum
{
    public const uzbek = 'uz';
    public const russian = 'ru';

    public const LABELS = [
        self::uzbek => "O'zbek",
        self::russian => 'Русский',
    ];

    public const KEYS = [
        "O'zbek" => self::uzbek,
        'Русский' => self::russian,
    ];
}