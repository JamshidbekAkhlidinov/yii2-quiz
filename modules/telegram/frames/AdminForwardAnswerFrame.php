<?php
/*
 *   Jamshidbek Akhlidinov
 *   23 - 5 2024 23:34:26
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\frames;

use app\modules\telegram\base\BotMessageFrame;
use app\modules\telegram\enums\ButtonNamesEnum;
use ustadev\telegram\Keyboard;

class AdminForwardAnswerFrame extends BotMessageFrame
{
    public function getMessage()
    {
        return "Yo'naltirmoqchi bo'lgan xabaringizni yuboring!";
    }

    public function getOptions()
    {
        $keyboard = new Keyboard();
        $keyboard->addDefault(translateBotMessage(ButtonNamesEnum::cancel_forward));
        return [
            'parse_mode' => 'html',
            'reply_markup' => $keyboard->init(),
        ];
    }
}