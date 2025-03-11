<?php

namespace app\modules\admin\models;

use app\models\UserProfile;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_hash
 * @property string|null $oauth_client
 * @property string|null $oauth_client_user_id
 * @property string $email
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $logged_at
 * @property string|null $verification_token
 * @property string|null $password_reset_token
 *
 * @property Answer[] $answers
 * @property Answer[] $answers0
 * @property Question[] $questions
 * @property Question[] $questions0
 * @property SelectedTestItem[] $selectedTestItems
 * @property SelectedTestItem[] $selectedTestItems0
 * @property SelectedTest[] $selectedTests
 * @property SelectedTest[] $selectedTests0
 * @property Test[] $tests
 * @property Test[] $tests0
 * @property UserProfile $userProfile
 * @property UserTest[] $userTests
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'access_token', 'password_hash', 'email'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at', 'logged_at'], 'safe'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 40],
            [['password_hash', 'oauth_client', 'oauth_client_user_id', 'email', 'verification_token', 'password_reset_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate( 'ID'),
            'username' => translate( 'Username'),
            'auth_key' => translate( 'Auth Key'),
            'access_token' => translate( 'Access Token'),
            'password_hash' => translate( 'Password Hash'),
            'oauth_client' => translate( 'Oauth Client'),
            'oauth_client_user_id' => translate( 'Oauth Client User'),
            'email' => translate( 'Email'),
            'status' => translate( 'Status'),
            'created_at' => translate( 'Created At'),
            'updated_at' => translate( 'Updated At'),
            'logged_at' => translate( 'Logged At'),
            'verification_token' => translate( 'Verification Token'),
            'password_reset_token' => translate( 'Password Reset Token'),
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\AnswerQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Answers0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\AnswerQuery
     */
    public function getAnswers0()
    {
        return $this->hasMany(Answer::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\QuestionQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Questions0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\QuestionQuery
     */
    public function getQuestions0()
    {
        return $this->hasMany(Question::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[SelectedTestItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SelectedTestItemQuery
     */
    public function getSelectedTestItems()
    {
        return $this->hasMany(SelectedTestItem::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[SelectedTestItems0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SelectedTestItemQuery
     */
    public function getSelectedTestItems0()
    {
        return $this->hasMany(SelectedTestItem::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[SelectedTests]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SelectedTestQuery
     */
    public function getSelectedTests()
    {
        return $this->hasMany(SelectedTest::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[SelectedTests0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SelectedTestQuery
     */
    public function getSelectedTests0()
    {
        return $this->hasMany(SelectedTest::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\TestQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Tests0]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\TestQuery
     */
    public function getTests0()
    {
        return $this->hasMany(Test::class, ['updated_by' => 'id']);
    }

    /**
     * Gets query for [[UserProfile]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserProfileQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserTests]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\UserTestQuery
     */
    public function getUserTests()
    {
        return $this->hasMany(UserTest::class, ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\UserQuery(get_called_class());
    }

    public function getPublicIdentity()
    {
        if ($this->userProfile && $this->userProfile->getFullname()) {
            return $this->userProfile->getFullname();
        }
        if ($this->username) {
            return $this->username;
        }
        return $this->email;
    }
}
