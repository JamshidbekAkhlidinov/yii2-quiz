<?php
/*
 *  Jamshidbek Akhlidinov
 *   27 - 4 2024 18:52:56
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\frames;

use app\modules\telegram\base\BotMessageFrame;

class LogoutAdminFrame extends BotMessageFrame
{
    public function getMessage()
    {
        return "Adminkadan chiqdingiz!!";
    }

    public function getOptions()
    {
        return [
            'reply_markup' => json_encode([
                'remove_keyboard' => true,
            ]),
        ];
    }
}