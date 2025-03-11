<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 12 2023 16:51:11
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\widgets\slider;

use app\modules\admin\widgets\slider\assets\BaseAsset;
use app\modules\admin\widgets\slider\enums\SwiperTypeEnum;
use yii\helpers\Html;
use yii\jui\Widget;

class SwiperSliderWidget extends Widget
{

    public string $type = SwiperTypeEnum::TYPE_DEFAULT;

    public array $items = [
        "/images/small/img-1.jpg",
        "/images/small/img-2.jpg",
        "/images/small/img-3.jpg",
        "/images/small/img-4.jpg",
        "/images/small/img-5.jpg",
        "/images/small/img-6.jpg",
        "/images/small/img-7.jpg",
        "/images/small/img-8.jpg",
        "/images/small/img-9.jpg",
    ];

    public $options = [];

    public function init()
    {
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'rounded';
        }
    }

    public function initSwiper()
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = $this->initItem($item);
        }
        return Html::tag(
            'div',
            implode("", $items),
            [
                'class' => 'swiper-wrapper',
            ]
        );
    }

    public function initItem($item)
    {
        return Html::tag(
            'div',
            Html::img($item, ['class' => 'img-fluid']),
            [
                'class' => 'swiper-slide'
            ]
        );
    }


    private function initButtons()
    {
        $html = "";
        switch ($this->type) {
            case SwiperTypeEnum::TYPE_FRACTION:
            case SwiperTypeEnum::TYPE_NAVIGATOR:
            case SwiperTypeEnum::TYPE_PROGRESS:
            case SwiperTypeEnum::TYPE_SCROLLBAR:
                $html .= Html::tag('div', "", ['class' => 'swiper-button-next']);
                $html .= Html::tag('div', "", ['class' => 'swiper-button-prev']);
                $html .= Html::tag('div', "", ['class' => 'swiper-pagination']);
                break;
            case SwiperTypeEnum::TYPE_MOUSEWHEEL:
            case SwiperTypeEnum::TYPE_FADE:
            case SwiperTypeEnum::TYPE_EFFECT_FLIP:
            case SwiperTypeEnum::TYPE_EFFECT:
            case SwiperTypeEnum::TYPE_VERTICAL:
                $html .= Html::tag('div', "", ['class' => 'swiper-pagination']);
                break;
            case SwiperTypeEnum::TYPE_COVERFLOW:
                $html .= Html::tag('div', "", ['class' => 'swiper-pagination swiper-pagination-dark']);
                break;
            case SwiperTypeEnum::TYPE_DYNAMIC:
                $html .= Html::tag('div', "", ['class' => 'swiper-pagination dynamic-pagination']);
                break;
            case SwiperTypeEnum::TYPE_PAGINATION:
                $html .= Html::tag('div', "", ['class' => 'swiper-pagination pagination-custom']);
                break;

        }

        return $html;
    }

    public function run()
    {

        $view = $this->getView();
        BaseAsset::register($view);

        $options = array_merge(
            $this->options,
            [
                'class' => [
                    'swiper',
                    $this->type,
                    $this->options['class']
                ]
            ]
        );

        return Html::tag(
            'div',
            $this->initSwiper() . $this->initButtons(),
            $options,
        );
    }
}
