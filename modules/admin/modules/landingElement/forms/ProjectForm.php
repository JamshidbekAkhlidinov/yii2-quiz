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

class ProjectForm extends LandingModel
{
    public $design_image;
    public $design_title;
    public $design_sub_text;
    public $design_type;
    public $design_description;
    public $design_url;
    public $structure_title;
    public $structure_description;
    public $structure_sub_text;
    public $structure_image;
    public $structure_type;

    public function rules()
    {
        return [
            [['design_title', 'structure_title', 'design_url', 'structure_type', 'design_type'], 'required'],
            [['design_description', 'structure_description', 'structure_sub_text', 'design_sub_text'], 'string'],
            [['design_image', 'structure_image'], 'safe']
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::DESIGN,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'design_title' => 'title',
                    'design_description' => 'description',
                    'design_image' => 'files',
                    'design_url' => 'url',
                    'design_sub_text' => 'sub_text',
                    'design_type' => 'icon'
                ]
            ],
            [
                'key' => [
                    'key' => LandingElementEnum::STRUCTURE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'structure_title' => 'title',
                    'structure_type' => 'icon',
                    'structure_description' => 'description',
                    'structure_sub_text' => 'sub_text',
                    'structure_image' => 'files',
                ]
            ],

        ];
    }

    public function attributeLabels()
    {
        return [
            'design_title' => translate('Title'),
            'design_description' => translate('Description'),
            'design_image' => translate('Image'),
            # Service Title
            'design_url' => translate("Url"),
            'design_sub_text' => translate("Sub Text"),
            # Widget
            'design_type' => translate("Type"),
            'structure_title' => translate("Description"),
            'structure_type' => translate("Type"),
            'structure_description' => translate("Description"),
            'structure_sub_text' => translate("Sub Text"),
            # Create Title
            'structure_image' => translate("Image"),
        ];
    }

}