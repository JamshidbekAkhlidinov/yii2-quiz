<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $test_id
 * @property string|null $text
 * @property int|null $status
 * @property float|null $ball
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Answer[] $answers
 * @property User $createdBy
 * @property Subject $subject
 * @property Test $test
 * @property User $updatedBy
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
            ],
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'test_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['text'], 'string'],
            [['ball'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::class, 'targetAttribute' => ['test_id' => 'id']],
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
            'subject_id' => translate('Subject'),
            'test_id' => translate('Test'),
            'text' => translate('Text'),
            'status' => translate('Status'),
            'ball' => translate('Ball'),
            'created_at' => translate('Created At'),
            'updated_at' => translate('Updated At'),
            'created_by' => translate('Created By'),
            'updated_by' => translate('Updated By'),
        ];
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
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\TestQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::class, ['id' => 'test_id']);
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

    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['question_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\QuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\QuestionQuery(get_called_class());
    }
}
