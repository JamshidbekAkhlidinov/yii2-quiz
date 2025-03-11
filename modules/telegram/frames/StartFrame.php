<?php
/*
 *  Jamshidbek Akhlidinov
 *   27 - 4 2024 18:52:56
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\frames;

use app\modules\telegram\base\BotMessageFrame;
use app\modules\telegram\enums\ButtonNamesEnum;
use ustadev\telegram\Keyboard;

class StartFrame extends BotMessageFrame
{
    public function getMessage()
    {
        return translateBotMessage("Hello user!");
    }

    public function getOptions()
    {

        $menu = new Keyboard();
        foreach (ButtonNamesEnum::menuList as $name) {
            $menu->addDefault(translateBotMessage($name));
            $menu->addRow();
        }

        return [
            'parse_mode' => 'html',
            'reply_markup' => $menu->init(),
        ];
    }
}