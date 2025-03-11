<?php

namespace app\modules\telegram\frames;

use app\modules\telegram\base\BotMessageFrame;

class CodeInErrorFrame extends BotMessageFrame
{
    public bool $is_admin = true;

    public \Exception $exception;

    public function __construct($exception,$config = [])
    {
        $this->exception = $exception;
        parent::__construct($config);
    }

    public function getMessage()
    {
        $exception = $this->exception;
        $text = "Error code:" . $exception->getCode() . "\n";
        $text .= "Error file:" . $exception->getFile() . "\n";
        $text .= "Error code line:" . $exception->getLine() . "\n";
        $text .= "Error message:" . $exception->getMessage();

        return "<pre>" . $text . "</pre>";
    }
}