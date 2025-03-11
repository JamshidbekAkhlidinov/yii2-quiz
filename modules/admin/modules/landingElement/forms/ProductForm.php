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

class ProductForm extends LandingModel
{
    public LandingElement $element;

    public $icon;

    public $title;

    public $sub_text;

    public $price;

    public $description;

    public $value;

    public $url;

    public $order;

    public $chekout;

    public function rules()
    {
        return [
            [['icon', 'title', 'url', 'sub_text'], 'required'],
            [['description', 'price', 'value'], 'string'],
            ['chekout', 'integer']
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
                    'url' => 'url',
                    'sub_text' => 'sub_text',
                    'price' => 'created_at',
                    'value' => 'value',
                    'order' => 'order',
                    'chekout' => 'icon'
                ]
            ],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'icon' => translate('Icon'),
            'title' => translate('Name'),
            'description' => translate('Description'),
            'url' => translate('Url'),
            'price' => translate("Price"),
            'value' => translate("Value"),
            'sub_text' => translate("Type"),
            'order' => translate("Order"),
            'chekout' => translate("Month or Year"),
        ];
    }

}