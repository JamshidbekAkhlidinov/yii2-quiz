<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "selected_test_item".
 *
 * @property int $id
 * @property int|null $selected_test_id
 * @property int|null $subject_id
 * @property int|null $count
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status
 *
 * @property User $createdBy
 * @property SelectedTest $selectedTest
 * @property Subject $subject
 * @property User $updatedBy
 */
class SelectedTestItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'selected_test_item';
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
            [['selected_test_id', 'subject_id', 'count', 'created_by', 'updated_by','status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['selected_test_id'], 'exist', 'skipOnError' => true, 'targetClass' => SelectedTest::class, 'targetAttribute' => ['selected_test_id' => 'id']],
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
            'selected_test_id' => translate( 'Selected Test'),
            'subject_id' => translate( 'Subject'),
            'count' => translate( 'Count'),
            'created_at' => translate( 'Created At'),
            'updated_at' => translate( 'Updated At'),
            'created_by' => translate( 'Created By'),
            'updated_by' => translate( 'Updated By'),
            'status' => translate( 'Status'),
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
     * @return \app\modules\admin\models\query\SelectedTestItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\SelectedTestItemQuery(get_called_class());
    }
}
