<?php

namespace app\modules\admin\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\Card;
use app\modules\admin\models\CardAssigned;
use app\modules\admin\models\CardAssignedItem;
use app\modules\admin\models\CardData;
use yii\base\Model;

class BlancForm extends Model
{
    public Card $card;

    public function __construct(Card $card, $config = [])
    {
        $this->card = $card;
        parent::__construct($config);
    }


    public function save()
    {
        $card = $this->card;
        $items = $card->cardItems;

        for ($i = 1; $i <= $card->count; $i++) {

            $blankModel = new CardAssigned([
                'card_id' => $card->id,
                'subject_id' => $card->subject_id,
                'status' => StatusEnum::ACTIVE,
            ]);

            if ($blankModel->save()) {

                foreach ($items as $item) {

                    $cardData = CardData::find()
                        ->andWhere(['type' => $item->type])
                        ->andWhere(['subject_id' => $card->subject_id])
                        ->orderBy('RAND()')
                        ->limit($item->count)->all();

                    foreach ($cardData as $assignItem) {
                        $assignModel = new CardAssignedItem([
                            'card_data_id' => $assignItem->id,
                            'card_assigned_id' => $blankModel->id,
                        ]);
                       if(! $assignModel->save()){
                           print_r($assignModel->getErrors());
                           exit();
                       }
                    }
                }

            }
        }
        return true;
    }
}