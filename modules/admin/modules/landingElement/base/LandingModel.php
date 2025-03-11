<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 11:46:1
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\landingElement\base;


use app\modules\admin\modules\landingElement\models\LandingElement;

abstract class LandingModel extends \yii\base\Model
{
    public const TYPE_STRING = 'string';

    public const TYPE_PHOTO = 'photo';

    public const TYPE_ARRAY = 'array';

    private array $modelState = [];

    public function init()
    {
        parent::init();
        $this->loadAttributes();
    }

    public function loadAttributes()
    {
        foreach ($this->dataRules() as $rule) {
            $model = $this->getModel($rule['key'] ?? []);
            foreach ($rule['attributes'] as $thisAttribute => $modelAttribute) {
                if ($rule['type'] == self::TYPE_STRING) {
                    $this->{$thisAttribute} = $model->{$modelAttribute};
                } elseif ($rule['type'] == self::TYPE_ARRAY) {
                    $this->{$thisAttribute} = json_decode(
                        $model->{$modelAttribute},
                        true
                    );
                } else {
                    if (!$model->isNewRecord && $model->files) {
                        $this->{$thisAttribute} = json_decode(
                            $model->{$modelAttribute},
                            true
                        );
                    }
                }
            }
        }
    }

    public function dataRules(): array
    {
        return [];
    }

    protected function getModel($params): LandingElement
    {
        $key = json_encode($params);
        if (!isset($this->modelState[$key])) {
            $model = LandingElement::findOne($params);
            if ($model == null) {
                $model = new LandingElement($params);
            }
            $this->modelState[$key] = $model;
        }
        return $this->modelState[$key];
    }


    public function beforeSave(): bool
    {
        return $this->validate();
    }

    public function save(): bool
    {
        if ($this->beforeSave()) {
            return $this->saveAttributes();
        }
        return false;
    }


    public function saveAttributes(): bool
    {
        $transaction = app()->db->beginTransaction();
        $isSave = false;
        try {
            foreach ($this->dataRules() as $rule) {
                $model = $this->getModel($rule['key'] ?? []);
                foreach ($rule['attributes'] as $thisAttribute => $modelAttribute) {
                    if ($rule['type'] == self::TYPE_STRING) {
                        $model->{$modelAttribute} = $this->{$thisAttribute};
                    } elseif ($rule['type'] == self::TYPE_ARRAY) {
                        $model->{$modelAttribute} = json_encode(
                            $this->{$thisAttribute},
                            JSON_UNESCAPED_UNICODE
                        );
                    } elseif ($rule['type'] == self::TYPE_PHOTO) {
                        $model->files = $this->{$thisAttribute};
                    } else {
                        $model->{$modelAttribute} = $this->{$thisAttribute};
                    }
                }
                $isSave = $model->save(false);
            }
            if ($isSave) {
                $transaction->commit();
            }
        } catch (\Throwable $exception) {
            $transaction->rollBack();
        }
        return $isSave;
    }

}