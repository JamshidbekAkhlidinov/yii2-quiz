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
use app\modules\telegram\enums\LanguageEnum;
use ustadev\telegram\Keyboard;

class LanguageFrame extends BotMessageFrame
{
    public function getMessage()
    {
        return translateBotMessage("Hello user! Selected your comfortable language!!");
    }

    public function getOptions()
    {
        $menu = new Keyboard();

        foreach (LanguageEnum::LABELS as $label) {
            $menu->addDefault($label);
            $menu->addRow();
        }

        return [
            'parse_mode' => 'html',
            'reply_markup' => $menu->init(),
        ];
    }
}