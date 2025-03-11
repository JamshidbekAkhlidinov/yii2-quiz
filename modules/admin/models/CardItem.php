<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "card_item".
 *
 * @property int $id
 * @property int|null $card_id
 * @property int|null $type
 * @property int|null $count
 * @property string|null $deleted_at
 *
 * @property Card $card
 * @property CardAssign[] $cardAssigns
 */
class CardItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_id', 'type', 'count'], 'integer'],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::class, 'targetAttribute' => ['card_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'card_id' => translate('Card ID'),
            'type' => translate('Type'),
            'count' => translate('Count'),
        ];
    }

    /**
     * Gets query for [[Card]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardQuery
     */
    public function getCard()
    {
        return $this->hasOne(Card::class, ['id' => 'card_id']);
    }

    /**
     * Gets query for [[CardAssigns]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardAssignQuery
     */
    public function getCardAssigns()
    {
        return $this->hasMany(CardAssign::class, ['card_item_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\CardItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\CardItemQuery(get_called_class());
    }
}
