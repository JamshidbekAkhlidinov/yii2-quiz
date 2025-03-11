<?php

namespace app\modules\admin\models;

use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 *
 * @property Answer[] $answers
 * @property Question[] $questions
 * @property Test[] $tests
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    public function behaviors()
    {
        return [
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'name' => translate('Name'),
            'status' => translate('Status'),
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\AnswerQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\QuestionQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\TestQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::class, ['subject_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\SubjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\SubjectQuery(get_called_class());
    }
}
