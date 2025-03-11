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

class HeaderTitleForm extends LandingModel
{
    public $background;
    public $title;
    public $description;
    public $order;
    public $status;

    public $service_title;
    public $service_description;
    public $service_order;
    public $service_status;

    public $widget_title;
    public $widget_description;
    public $widget_image;
    public $widget_sub_text;
    public $widget_icon;
    public $widget_order;
    public $widget_status;

    public $create_title;
    public $create_url;
    public $create_order;
    public $create_status;

    public $question_title;
    public $question_description;
    public $question_order;
    public $question_status;

    public $process_title;
    public $process_description;
    public $process_order;
    public $process_status;

    public $product_title;
    public $product_description;
    public $product_order;
    public $product_status;

    public $partner_status;
    public $partner_order;

    public $team_title;
    public $team_description;
    public $team_button;
    public $team_button_title;
    public $team_status;
    public $team_order;

    public $statistic_status;
    public $statistic_order;

    public $opinion_status;
    public $opinion_order;


    public function rules()
    {
        return [
            [['background', 'title', 'service_title', 'widget_title', 'create_title', 'widget_icon', 'question_title', 'product_title', 'process_title'], 'required'],
            [['description', 'service_description', 'widget_description', 'widget_sub_text', 'create_url', 'question_description', 'product_description', 'process_description', 'team_description', 'team_title', 'team_button', 'team_button_title'], 'string'],
            [['widget_image', 'widget_icon'], 'safe'],
            [['status', 'order', 'product_status', 'product_order', 'service_order', 'service_status', 'widget_order', 'widget_status', 'question_order', 'question_status', 'product_status', 'process_order', 'process_status','create_order', 'create_status', 'team_order', 'team_status', 'opinion_status', 'opinion_order', 'statistic_order', 'statistic_status'], 'integer']
        ];
    }

    public function dataRules(): array
    {
        return [
            [
                'key' => [
                    'key' => LandingElementEnum::HEADER_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'title' => 'title',
                    'description' => 'description',
                    'background' => 'files',
                    'status' => 'status',
                    'order' => 'order'
                ]
            ],
            # Service Title
            [
                'key' => [
                    'key' => LandingElementEnum::SERVICE_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'service_title' => 'title',
                    'service_description' => 'description',
                    'service_status' => 'status',
                    'service_order' => 'order'
                ]
            ],
            # Widget
            [
                'key' => [
                    'key' => LandingElementEnum::WIDGETS,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'widget_title' => 'title',
                    'widget_description' => 'description',
                    'widget_image' => 'files',
                    'widget_sub_text' => 'sub_text',
                    'widget_icon' => 'icon',
                    'widget_status' => 'status',
                    'widget_order' => 'order'
                ]
            ],

            # Create title
            [
                'key' => [
                    'key' => LandingElementEnum::CREATE_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'create_title' => 'title',
                    'create_url' => 'url',
                    'create_status' => 'status',
                    'create_order' => 'order',
                ]
            ],

            # Question Title
            [
                'key' => [
                    'key' => LandingElementEnum::QUESTION_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'question_title' => 'title',
                    'question_description' => 'description',
                    'question_status' => 'status',
                    'question_order' => 'order'
                ]
            ],
            # Product Title
            [
                'key' => [
                    'key' => LandingElementEnum::PRODUCT_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'product_title' => 'title',
                    'product_description' => 'description',
                    'product_status' => 'status',
                    'product_order' => 'order'
                ]
            ],

            #Process Title
            [
                'key' => [
                    'key' => LandingElementEnum::PROCESS_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'process_title' => 'title',
                    'process_description' => 'description',
                    'process_status' => 'status',
                    'process_order' => 'order'
                ]
            ],

            #Team Title
            [
                'key' => [
                    'key' => LandingElementEnum::TEAM_TITLE,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'team_title' => 'title',
                    'team_description' => 'description',
                    'team_button' => 'url',
                    'team_button_title' => 'sub_text',
                    'team_status' => 'status',
                    'team_order' => 'order'
                ]
            ],
            #Statistic Status
            [
                'key' => [
                    'key' => LandingElementEnum::STATISTIC_STATUS,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'statistic_status' => 'status',
                    'statistic_order' => 'order'
                ]
            ],
            #Opinion Status
            [
                'key' => [
                    'key' => LandingElementEnum::OPINION_STATUS,
                ],
                'type' => self::TYPE_STRING,
                'attributes' => [
                    'opinion_status' => 'status',
                    'opinion_order' => 'order'
                ]
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'logo' => translate('Background'),
            'title' => translate('Title'),
            'description' => translate('Description'),
            'status' => translate('Status'),
            'order' => translate('Order'),
            # Service Title
            'service_title' => translate("Title"),
            'service_description' => translate("Description"),
            'service_status' => translate('Status'),
            'service_order' => translate('Order'),
            # Widget
            'widget_title' => translate("Title"),
            'widget_description' => translate("Description"),
            'widget_sub_text' => translate("Sub Text"),
            'widget_image' => translate("Image"),
            'widget_icon' => translate("Icon"),
            'widget_status' => translate('Status'),
            'widget_order' => translate('Order'),
            # Create Title
            'create_title' => translate("Title"),
            'create_url' => translate("Url"),
            'create_status' => translate('Status'),
            'create_order' => translate('Order'),
            # Question Title
            'question_title' => translate("Title"),
            'question_description' => translate("Description"),
            'question_status' => translate('Status'),
            'question_order' => translate('Order'),
            # Process Title
            'process_title' => translate("Title"),
            'process_description' => translate("Description"),
            'process_status' => translate('Status'),
            'process_order' => translate('Order'),
            # Product Title
            'product_title' => translate("Title"),
            'product_description' => translate("Description"),
            'product_status' => translate('Status'),
            'product_order' => translate('Order'),
            # Product Title
            'team_title' => translate("Title"),
            'team_description' => translate("Description"),
            'team_button' => translate('Button'),
            'team_button_title' => translate('Button Title'),
            'team_status' => translate('Status'),
            'team_order' => translate('Order'),
        ];
    }

}