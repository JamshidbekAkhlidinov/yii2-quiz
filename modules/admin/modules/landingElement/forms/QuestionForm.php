<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:48:13
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\forms;


use app\modules\admin\modules\landingElement\base\LandingModel;
use app\modules\admin\modules\landingElement\models\LandingElement;

class QuestionForm extends LandingModel
{
    public LandingElement $element;


    public $title;

    public $description;


    public function rules()
    {
        return [
            [['title'], 'required'],
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
                ]
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'title' => translate('Title'),
            'description' => translate('Description'),
        ];
    }

}