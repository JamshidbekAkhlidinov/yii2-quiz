<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "card_assigned_item".
 *
 * @property int $id
 * @property int|null $card_data_id
 * @property int|null $card_assigned_id
 *
 * @property CardAssigned $cardAssigned
 * @property CardData $cardData
 */
class CardAssignedItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card_assigned_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_data_id', 'card_assigned_id'], 'integer'],
            [['card_assigned_id'], 'exist', 'skipOnError' => true, 'targetClass' => CardAssigned::class, 'targetAttribute' => ['card_assigned_id' => 'id']],
            [['card_data_id'], 'exist', 'skipOnError' => true, 'targetClass' => CardData::class, 'targetAttribute' => ['card_data_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'card_data_id' => translate('Card Data ID'),
            'card_assigned_id' => translate('Card Assigned ID'),
        ];
    }

    /**
     * Gets query for [[CardAssigned]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardAssignedQuery
     */
    public function getCardAssigned()
    {
        return $this->hasOne(CardAssigned::class, ['id' => 'card_assigned_id']);
    }

    /**
     * Gets query for [[CardData]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardQuery
     */
    public function getCardData()
    {
        return $this->hasOne(CardData::class, ['id' => 'card_data_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\CardAssignedItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\CardAssignedItemQuery(get_called_class());
    }
}
