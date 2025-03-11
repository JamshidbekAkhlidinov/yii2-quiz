<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "user_test_item".
 *
 * @property int $id
 * @property int|null $user_test_id
 * @property int|null $question_id
 * @property int|null $select_answer_id
 * @property string|null $select_answer
 * @property int|null $order
 * @property int|null $is_true
 *
 * @property Question $question
 * @property Answer $selectAnswer
 * @property UserTest $userTest
 */
class UserTestItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_test_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_test_id', 'question_id', 'select_answer_id', 'order', 'is_true'], 'integer'],
            [['select_answer'], 'string'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::class, 'targetAttribute' => ['question_id' => 'id']],
            [['select_answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Answer::class, 'targetAttribute' => ['select_answer_id' => 'id']],
            [['user_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserTest::class, 'targetAttribute' => ['user_test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate( 'ID'),
            'user_test_id' => translate( 'User Test'),
            'question_id' => translate( 'Question'),
            'select_answer_id' => translate( 'Select Answer'),
            'select_answer' => translate( 'Select Answer'),
            'order' => translate( 'Order'),
            'is_true' => translate( 'Is True'),
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\QuestionQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::class, ['id' => 'question_id']);
    }

    /**
     * Gets query for [[SelectAnswer]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\AnswerQuery
     */
    public function getSelectAnswer()
    {
        return $this->hasOne(Answer::class, ['id' => 'select_answer_id']);
    }

    /**
     * Gets query for [[UserTest]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserTestQuery
     */
    public function getUserTest()
    {
        return $this->hasOne(UserTest::class, ['id' => 'user_test_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\UserTestItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\UserTestItemQuery(get_called_class());
    }
}
