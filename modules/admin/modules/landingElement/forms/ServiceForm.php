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

class ServiceForm extends LandingModel
{
    public LandingElement $element;

    public $logo;

    public $title;

    public $description;

    public $url;

    public function rules()
    {
        return [
            [['logo', 'title', 'url'], 'required'],
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
                    'logo' => 'files',
                    'url' => 'url',
                ]
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'logo' => translate('Logo'),
            'title' => translate('Title'),
            'description' => translate('Description'),
            'url' => translate('Url'),
        ];
    }

}