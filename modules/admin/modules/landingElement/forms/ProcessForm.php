<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:48:13
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\forms;


use app\modules\admin\enums\LandingElementEnum;
use app\modules\admin\modules\landingElement\base\LandingModel;
use app\modules\admin\modules\landingElement\models\LandingElement;

class ProcessForm extends LandingModel
{
    public LandingElement $element;

    public $icon;

    public $title;

    public $description;


    public function rules()
    {
        return [
            [['icon', 'title'], 'required'],
            [['description'], 'string'],
        ];
    }

    protected function getModel($params): LandingElement
    {
        return $this->element;
    }

    public function dataRules(): array
    {
        return [
            [
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                    'icon' => 'files',
                ]
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'icon' => translate('Icon'),
            'title' => translate('Title'),
            'description' => translate('Description'),
        ];
    }

}