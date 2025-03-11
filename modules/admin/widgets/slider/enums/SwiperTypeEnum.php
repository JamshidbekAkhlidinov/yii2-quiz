<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 12 2023 16:59:25
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\slider\enums;

interface SwiperTypeEnum
{
    public const TYPE_DEFAULT = 'default-swiper';
    public const TYPE_NAVIGATOR = 'navigation-swiper';
    public const TYPE_DYNAMIC = 'pagination-dynamic-swiper';
    public const TYPE_FRACTION = 'pagination-fraction-swiper';
    public const TYPE_PAGINATION = 'pagination-custom-swiper';
    public const TYPE_PROGRESS = 'pagination-progress-swiper';
    public const TYPE_SCROLLBAR = 'pagination-scrollbar-swiper';
    public const TYPE_VERTICAL = 'vertical-swiper';
    public const TYPE_MOUSEWHEEL = 'mousewheel-control-swiper';
    public const TYPE_FADE = 'effect-fade-swiper';
    public const TYPE_EFFECT = 'effect-creative-swiper';
    public const TYPE_EFFECT_FLIP = 'effect-flip-swiper';
    public const TYPE_COVERFLOW = 'effect-coverflow-swiper';

    public const ALL = [
        self::TYPE_DEFAULT,
        self::TYPE_NAVIGATOR,
        self::TYPE_DYNAMIC,
        self::TYPE_FRACTION,
        self::TYPE_PAGINATION,
        self::TYPE_PROGRESS,
        self::TYPE_SCROLLBAR,
        self::TYPE_VERTICAL,
        self::TYPE_MOUSEWHEEL,
        self::TYPE_FADE,
        self::TYPE_EFFECT,
        self::TYPE_EFFECT_FLIP,
        self::TYPE_COVERFLOW,
    ];

}