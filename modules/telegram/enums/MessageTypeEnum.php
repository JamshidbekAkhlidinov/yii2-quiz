<?php
/*
 *  Jamshidbek Akhlidinov
 *   27 - 4 2024 19:11:22
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\enums;

interface MessageTypeEnum
{
    public const text = 'text';
    public const photo = 'photo';
    public const file = 'file';
    public const video = 'video';
    public const media_group = 'media_group';
}