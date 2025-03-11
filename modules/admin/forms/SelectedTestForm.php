<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 6 2024 17:51:59
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\SelectedTest;
use app\modules\admin\models\SelectedTestItem;
use yii\base\Model;

class SelectedTestForm extends Model
{
    public SelectedTest $model;

    public $name;
    public $description;
    public $status;
    public $items;

    public function rules()
    {
        return [
            [['name', 'description'], 'safe'],
            ['status', 'integer'],
            ['items', 'safe'],
        ];
    }

    public function __construct(SelectedTest $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        $this->description = $model->description;
        $this->status = $model->status;
        $this->items = $this->initItems($model);

        parent::__construct($config);
    }

    private function initItems(SelectedTest $model)
    {
        $items = [];
        foreach ($model->getSelectedTestItems()->active()->all() as $item) {
            /**
             * @var $item SelectedTestItem
             */
            $items[] = [
                'subject_id' => $item->subject_id,
                'count' => $item->count,
                'selected_test_item' => $item->id
            ];
        }
        return $items;
    }

    public function save()
    {
        $model = $this->model;
        $model->name = $this->name;
        $model->description = $this->description;
        $model->status = $this->status;

        $isSave = $model->save();
        if ($isSave) {
            $this->saveItems($model);
        }
        return $isSave;
    }

    private function saveItems(SelectedTest $model)
    {
        SelectedTestItem::updateAll(
            ['status' => StatusEnum::INACTIVE],
            ['selected_test_id' => $model->id]
        );
        foreach ($this->items as $item) {
            $itemModel = SelectedTestItem::findOne($item['selected_test_item'] ?? 0);
            if (!$itemModel) {
                $itemModel = new SelectedTestItem([
                    'selected_test_id' => $model->id,
                ]);
            }
            $itemModel->subject_id = $item['subject_id'];
            $itemModel->count = $item['count'];
            $itemModel->status = StatusEnum::ACTIVE;
            $itemModel->save();
        }
    }

}