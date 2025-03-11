<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 3:12:35
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\input;

use app\modules\admin\widgets\input\assets\FlatPickerAsset;
use yii\helpers\Html;
use yii\widgets\InputWidget;

class FlatPicker extends InputWidget
{
    public $options = [
        'placeholder' => '--Select--'
    ];

    public $dataMultipleDate = false;
    public $dataRangeDate = false;
    public $dataInlineDate = false;

    public $dataDefaultDate = false;



    public function initOptions()
    {
        $options = [
            "class" => "form-control",
            "data-provider" => "flatpickr",
            "data-date-format" => "d M Y",
            "data-default-date" => $this->dataDefaultDate,
            "data-inline-date" => $this->dataInlineDate,
            "data-range-date" => $this->dataRangeDate,
            "data-multiple-date" => $this->dataMultipleDate,
        ];
        $this->options = array_merge($this->options, $options);

        $view = $this->getView();
        FlatPickerAsset::register($view);
    }

    protected function renderInputHtml($type): string
    {
        $this->initOptions();

        if ($this->hasModel()) {
            return Html::activeInput($type, $this->model, $this->attribute, $this->options);
        }
        return Html::input($type, $this->name, $this->value, $this->options);
    }

    public function run()
    {
       return $this->renderInputHtml('text');
    }
}