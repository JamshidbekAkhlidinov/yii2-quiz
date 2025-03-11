<?php

namespace app\modules\admin\forms;

use app\modules\admin\models\Card;
use app\modules\admin\models\CardAssigned;
use app\modules\admin\models\CardData;
use app\modules\admin\models\CardItem;
use yii\base\Model;

class CardForm extends Model
{
    public Card $model;

    public $subject_id;

    public $count;

    public $name;
    public $faculty;
    public $university;
    public $department;
    public $education_direction;
    public $specialty;
    public $creator;
    public $department_head;

    public $items; //type, count

    public function __construct(Card $model, $config = [])
    {
        $this->model = $model;
        $this->subject_id = $model->subject_id;
        $this->name = $model->name;
        $this->count = $model->count;
        $this->university = $model->university;
        $this->faculty = $model->faculty;
        $this->department = $model->department;
        $this->education_direction = $model->education_direction;
        $this->specialty = $model->specialty;
        $this->creator = $model->creator;
        $this->department_head = $model->department_head;

        $this->items = $this->initItems($model);
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['name', 'items'], 'safe'],
            [['subject_id', 'count'], 'integer'],
            [['faculty','department','university','education_direction','specialty','creator','department_head',],'string']
        ];
    }

    public function save()
    {
        $model = $this->model;
        $model->subject_id = $this->subject_id;
        $model->name = $this->name;
        $model->count = $this->count;
        $model->university = $this->university;
        $model->faculty = $this->faculty;
        $model->department = $this->department;
        $model->education_direction = $this->education_direction;
        $model->specialty = $this->specialty;
        $model->creator = $this->creator;
        $model->department_head = $this->department_head;

        $isSave = $model->save();
        if ($isSave) {
            $this->saveItems($model);
            //$this->assignCard($model);
        }
        return $isSave;
    }

    private function saveItems(Card $model)
    {
        CardItem::updateAll(
            ['deleted_at' => date('Y-m-d H:i:s')],
            ['card_id' => $model->id]
        );
        foreach ($this->items as $item) {
            $cardItem = CardItem::findOne($item['card_item_id'] ?? 0);
            if (!$cardItem) {
                $cardItem = new CardItem();
            }
            $cardItem->card_id = $model->id;
            $cardItem->type = $item['type'];
            $cardItem->count = $item['count'];
            $cardItem->deleted_at = null;
            $cardItem->save();
        }
    }

    public function assignCard(Card $model)
    {
        foreach ($model->cardItems as $item) {
            $cardData = CardData::find()
                ->andWhere(['type' => $item->type])
                ->limit($item->count)->all();
            foreach ($cardData as $card) {
                $assignModel = new CardAssigned([
                    'card_data_id' => $card->id,
                    'card_id' => $model->id,
                ]);
                $assignModel->save();
            }
        }
    }

    private function initItems(Card $model)
    {
        $items = CardItem::find()->andWhere(
            ['deleted_at' => null, 'card_id' => $model->id]
        )->asArray()->all();
        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'card_item_id' => $item['id'],
                'type' => $item['type'],
                'count' => $item['count'],
            ];
        }
        return $data;
    }
}