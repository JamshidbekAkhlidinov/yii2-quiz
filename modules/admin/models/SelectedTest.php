<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "selected_test".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property SelectedTestItem[] $selectedTestItems
 * @property User $updatedBy
 */
class SelectedTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'selected_test';
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
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'name' => translate( 'Name'),
            'description' => translate( 'Description'),
            'status' => translate( 'Status'),
            'created_at' => translate( 'Created At'),
            'updated_at' => translate( 'Updated At'),
            'created_by' => translate( 'Created By'),
            'updated_by' => translate( 'Updated By'),
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
     * Gets query for [[SelectedTestItems]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\models\query\SelectedTestItemQuery
     */
    public function getSelectedTestItems()
    {
        return $this->hasMany(SelectedTestItem::class, ['selected_test_id' => 'id']);
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
     * @return \app\modules\admin\models\query\SelectedTestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\query\SelectedTestQuery(get_called_class());
    }
}
