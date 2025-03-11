<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "card_assigned".
 *
 * @property int $id
 * @property int|null $card_id
 * @property int|null $subject_id
 * @property int|null $status
 * @property string|null $assigned_at
 * @property int|null $assign_user_id
 *
 * @property User $assignUser
 * @property Card $card
 * @property CardAssignedItem[] $cardAssignedItems
 * @property Subject $subject
 */
class CardAssigned extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card_assigned';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_id', 'subject_id', 'status', 'assign_user_id'], 'integer'],
            [['assigned_at'], 'safe'],
            [['assign_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['assign_user_id' => 'id']],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Card::class, 'targetAttribute' => ['card_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
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
            'subject_id' => translate('Subject ID'),
            'status' => translate('Status'),
            'assigned_at' => translate('Assigned At'),
            'assign_user_id' => translate('Assign User ID'),
        ];
    }

    /**
     * Gets query for [[AssignUser]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserQuery
     */
    public function getAssignUser()
    {
        return $this->hasOne(User::class, ['id' => 'assign_user_id']);
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
     * Gets query for [[CardAssignedItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardAssignedItemQuery
     */
    public function getCardAssignedItems()
    {
        return $this->hasMany(CardAssignedItem::class, ['card_assigned_id' => 'id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SubjectQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::class, ['id' => 'subject_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\CardAssignedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\CardAssignedQuery(get_called_class());
    }
}
