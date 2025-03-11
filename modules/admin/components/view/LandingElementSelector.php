<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 21:54:45
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\view;

use app\modules\admin\enums\LandingElementEnum;
use app\modules\admin\modules\landingElement\models\LandingElement;

class LandingElementSelector
{
    protected array $elements = [];

    protected function isMultiple($key): bool
    {
        return in_array($key, LandingElementEnum::MULTIPLE_ENUMS);
    }

    public function __construct()
    {
        foreach (LandingElement::find()->orderBy(['order' => SORT_ASC])->all() as $element) {
            if ($this->isMultiple($element->key)) {
                $this->elements[$element->key][] = $element;
            } else {
                $this->elements[$element->key] = $element;
            }
        }

        foreach (LandingElementEnum::MULTIPLE_ENUMS as $enum) {
            if (isset($this->elements[$enum])) {
                usort(
                    $this->elements[$enum],
                    fn(LandingElement $a, LandingElement $b) => $a->order <=> $b->order
                );
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function get($enum)
    {
        if (!isset($this->elements[$enum])) {
            throw new \Exception("Page Not Configured. Need Element: $enum");
        }

        return $this->elements[$enum];
    }

    /**
     * @throws \Exception
     */
    public function getElement($enum): LandingElement
    {
        $value = $this->get($enum);

        if (is_array($value)) {
            throw new \Exception("Page Invalid Configured. Invalid Element: $enum");
        }

        return $value;
    }

    /**
     * @param $enum
     * @return LandingElement[]
     * @throws \Exception
     */
    public function getElements($enum): array
    {
        $value = $this->get($enum);

        if (!is_array($value)) {
            throw new \Exception("Page Invalid Configured. Invalid Element: $enum");
        }

        return $value;
    }
}