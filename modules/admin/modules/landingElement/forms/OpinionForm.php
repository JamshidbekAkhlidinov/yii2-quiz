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

class OpinionForm extends LandingModel
{
    public LandingElement $element;

    public $sub_text;

    public $name;

    public $description;

    public function rules()
    {
        return [
            [['sub_text', 'name'], 'required'],
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
                'key' => [
                    'key' => LandingElementEnum::OPINION,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'name' => 'title',
                    'description' => 'description',
                    'sub_text' => 'sub_text',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sub_text' => translate('Sub Text'),
            'title' => translate('Name'),
            'description' => translate('Description'),
        ];
    }

}