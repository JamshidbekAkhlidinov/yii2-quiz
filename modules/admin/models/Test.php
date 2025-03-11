<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property string|null $name
 * @property int|null $status
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Answer[] $answers
 * @property User $createdBy
 * @property Question[] $questions
 * @property Subject $subject
 * @property User $updatedBy
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
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
            [['subject_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at','started_at','ended_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
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
            'id' => translate( 'ID'),
            'subject_id' => translate( 'Subject'),
            'name' => translate( 'Name'),
            'status' => translate( 'Status'),
            'description' => translate( 'Description'),
            'created_at' => translate( 'Created At'),
            'updated_at' => translate( 'Updated At'),
            'created_by' => translate( 'Created By'),
            'updated_by' => translate( 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\AnswerQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['test_id' => 'id']);
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
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\QuestionQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['test_id' => 'id']);
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
     * @return \app\modules\admin\models\query\TestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\TestQuery(get_called_class());
    }
}
