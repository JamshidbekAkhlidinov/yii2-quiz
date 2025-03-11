<?php

namespace app\modules\admin\models;

/**
 * This is the model class for table "user_test".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $subject_id
 * @property int|null $test_id
 * @property int|null $selected_test_id
 * @property float|null $total_ball
 * @property float|null $solve_ball
 * @property int|null $total_count
 * @property int|null $solve_count
 * @property string|null $created_at
 * @property string|null $expired_at
 * @property int|null $status
 *
 * @property SelectedTest $selectedTest
 * @property Subject $subject
 * @property Test $test
 * @property User $user
 * @property UserTestItem[] $userTestItems
 */
class UserTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_test';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'subject_id', 'test_id', 'selected_test_id', 'total_count', 'solve_count', 'status'], 'integer'],
            [['total_ball', 'solve_ball'], 'number'],
            [['created_at', 'expired_at'], 'safe'],
            [['selected_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => SelectedTest::class, 'targetAttribute' => ['selected_test_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::class, 'targetAttribute' => ['subject_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::class, 'targetAttribute' => ['test_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'user_id' => translate('User'),
            'subject_id' => translate('Subject'),
            'test_id' => translate('Test'),
            'selected_test_id' => translate('Selected Test'),
            'total_ball' => translate('Total Ball'),
            'solve_ball' => translate('Solve Ball'),
            'total_count' => translate('Total Count'),
            'solve_count' => translate('Solve Count'),
            'created_at' => translate('Created At'),
            'expired_at' => translate('Expired At'),
            'status' => translate('Status'),
        ];
    }

    /**
     * Gets query for [[SelectedTest]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SelectedTestQuery
     */
    public function getSelectedTest()
    {
        return $this->hasOne(SelectedTest::class, ['id' => 'selected_test_id']);
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserTestItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserTestItemQuery
     */
    public function getUserTestItems()
    {
        return $this->hasMany(UserTestItem::class, ['user_test_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\UserTestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\UserTestQuery(get_called_class());
    }
}
