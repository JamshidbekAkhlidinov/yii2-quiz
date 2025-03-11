<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "card_data".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property string|null $text
 * @property int|null $type
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CardAssign[] $cardAssigns
 * @property User $createdBy
 * @property Subject $subject
 * @property User $updatedBy
 */
class CardData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card_data';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date(' Y-m-d H:i:s',)
            ],
            BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'type', 'created_by', 'updated_by'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
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
            'text' => translate('Text'),
            'type' => translate('Type'),
            'created_at' => translate('Created At'),
            'updated_at' => translate('Updated At'),
            'created_by' => translate('Created By'),
            'updated_by' => translate('Updated By'),
        ];
    }

    /**
     * Gets query for [[CardAssigns]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\CardAssignQuery
     */
    public function getCardAssigns()
    {
        return $this->hasMany(CardAssign::class, ['card_data_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
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
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\CardDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\CardDataQuery(get_called_class());
    }
}
