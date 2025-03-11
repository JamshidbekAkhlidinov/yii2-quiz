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

class AdminSendedUserFrame extends BotMessageFrame
{
    public $count;

    public function getMessage()
    {
        return "Foydalanuvchilarga xabar yuborildi\nSoni: {$this->count}";
    }

    public function getOptions()
    {
        $keyboard = new Keyboard();
        foreach (ButtonNamesEnum::adminMenuList as $item) {
            $keyboard->addDefault(translateBotMessage($item));
            $keyboard->addRow();
        }
        return [
            'parse_mode' => 'html',
            'reply_markup' => $keyboard->init(),
        ];
    }
}