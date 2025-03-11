<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 6 2024 19:9:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\input;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class NumberInput extends InputWidget
{
    protected function renderInputHtml($type)
    {
        if ($this->hasModel()) {
            return Html::activeInput($type, $this->model, $this->attribute, $this->options);
        }
        return Html::input($type, $this->name, $this->value, $this->options);
    }

    public function run()
    {
        return $this->renderInputHtml('number');
    }
}