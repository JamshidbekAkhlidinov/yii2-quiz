<?php
/*
 *  Jamshidbek Akhlidinov
 *   27 - 4 2024 18:52:1
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\base;

use app\modules\telegram\enums\MessageTypeEnum;

abstract class BotMessageFrame extends BaseRequest
{
    public string $message_type = MessageTypeEnum::text;
    public string $file_url = '';

    protected array $media = [];

    public function getMedia()
    {
        return json_encode($this->media);
    }

    public function getReplyMarkup()
    {
        return "";
    }

    public function getOptions()
    {
        return [
            'parse_mode' => 'html',
        ];
    }
}