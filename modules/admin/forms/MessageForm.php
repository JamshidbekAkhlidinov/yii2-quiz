<?php
/*
 *  Jamshidbek Akhlidinov
 *   30 - 5 2024 17:43:39
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use app\modules\admin\models\I18nMessage;
use app\modules\admin\models\I18nSourceMessage;
use yii\base\Model;

class MessageForm extends Model
{
    public I18nSourceMessage $model;
    public $category;
    public $message;
    public $items;

    public function __construct(I18nSourceMessage $model, $config = [])
    {
        $this->model = $model;
        $this->category = $model->category;
        $this->message = $model->message;
        $this->items = $this->initItems($model);
        parent::__construct($config);
    }

    public function initItems(I18nSourceMessage $model)
    {
        $items = [];
        $itemsModel = $model->getI18nMessages()->all();
        foreach ($itemsModel as $message) {
            $items[$message->language] = $message->translation;
        }
        return $items;
    }

    public function rules()
    {
        return [
            [['category', 'message'], 'string'],
            ['items', 'safe'],
        ];
    }

    public function save()
    {
        $transaction = app()->db->beginTransaction();
        try {
            $model = $this->model;
            $model->category = $this->category;
            $model->message = $this->message;
            $isSave = $model->save();
            if ($isSave) {
                I18nMessage::deleteAll(['id' => $model->id]);
                foreach ($this->items as $key => $value) {
                    $modelItem = new I18nMessage([
                        'id' => $model->id,
                        'language' => $key,
                        'translation' => $value,
                    ]);
                    $modelItem->save();
                }
            }
            $transaction->commit();
        } catch (\Exception $exception) {
            $isSave = false;
            $transaction->rollBack();
        }
        return $isSave;
    }
}