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

class PartnerForm extends LandingModel
{
    public LandingElement $element;

    public $logo;

    public function rules()
    {
        return [
            [['logo'], 'required'],
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
                    'logo' => 'files',
                ]
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'logo' => translate('Logo'),
        ];
    }

}