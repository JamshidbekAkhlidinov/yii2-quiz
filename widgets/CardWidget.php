<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 6 2024 17:5:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\widgets;

use yii\base\Widget;

class CardWidget extends Widget
{
    public $title = 'Subject';
    public $count = 10;

    public function run()
    {
        return $this->render('card', [
            'title' => $this->title,
            'count' => $this->count,
        ]);
    }
}