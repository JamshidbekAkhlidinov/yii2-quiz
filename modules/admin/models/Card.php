<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property string|null $name
 * @property string|null $university
 * @property string|null $faculty
 * @property string|null $department
 * @property string|null $education_direction
 * @property string|null $specialty
 * @property string|null $creator
 * @property string|null $department_head
 * @property int|null $count
 * @property int|null $status
 *
 * @property CardAssignedItem[] $cardAssignedItems
 * @property CardAssigned[] $cardAssigneds
 * @property CardItem[] $cardItems
 * @property Subject $subject
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'count', 'status', 'created_by', 'updated_by'], 'integer'],
            [['name','university','faculty','department','education_direction','specialty','creator','department_head',], 'string', 'max' => 255],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }


    public function behaviors()
    {
        return [
            BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'subject_id' => translate('Subject ID'),
            'name' => translate('Name'),
            'count' => translate('Count'),
            'status' => translate('Status'),
        ];
    }

    /**
     * Gets query for [[CardAssignedItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardAssignedItemQuery
     */
    public function getCardAssignedItems()
    {
        return $this->hasMany(CardAssignedItem::class, ['card_data_id' => 'id']);
    }

    /**
     * Gets query for [[CardAssigneds]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardAssignedQuery
     */
    public function getCardAssigneds()
    {
        return $this->hasMany(CardAssigned::class, ['card_id' => 'id']);
    }

    /**
     * Gets query for [[CardItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardItemQuery
     */
    public function getCardItems()
    {
        return $this->hasMany(CardItem::class, ['card_id' => 'id']);
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
     * @return \app\modules\admin\models\query\CardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\CardQuery(get_called_class());
    }
}
