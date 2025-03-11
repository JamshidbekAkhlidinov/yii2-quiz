<?php
/*
 *  Jamshidbek Akhlidinov
 *   6 - 5 2024 18:22:20
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\enums;

interface BotUserStepEnum
{
    public const null = 0;
    public const start = 1000;
    public const done = 2000;
    public const language = 3000;
    public const forward_message = 4000;
}