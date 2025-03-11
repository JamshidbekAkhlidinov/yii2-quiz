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

class ContactForm extends LandingModel
{

    public $title;

    public $sub_text;

    public $description;

    public $work_order;

    public function rules()
    {
        return [
            [['sub_text', 'title'], 'required'],
            [['description', 'work_order'], 'string'],
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::CONTACT,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'sub_text' => 'sub_text',
                    'description' => 'description',
                    'work_order' => 'value'
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => translate('Title'),
            'sub_text' => translate('Sub Text'),
            'description' => translate('Description'),
            'work_order' => translate('Work Order'),
        ];
    }

}