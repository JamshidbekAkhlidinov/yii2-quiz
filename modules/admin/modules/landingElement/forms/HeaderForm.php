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

class HeaderForm extends LandingModel
{
    public $logo;

    public $title;

    public $description;

    public function rules()
    {
        return [
            [['logo', 'title'], 'required'],
            [['description'], 'string'],
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::HEADER,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                    'logo' => 'files',
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'logo' => translate('Logo'),
            'title' => translate('Title'),
            'description' => translate('Description'),
        ];
    }

}