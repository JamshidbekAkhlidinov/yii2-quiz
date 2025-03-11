<?php

namespace app\modules\admin\modules\content\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $image
 * @property string|null $sub_text
 * @property string|null $description
 * @property int|null $status
 * @property string|null $publish_at
 * @property int|null $view_count
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property PostCategoryLinker[] $postCategoryLinkers
 * @property PostTagLinker[] $postTagLinkers
 * @property User $updatedBy
 */
class Post extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class'=>TimestampBehavior::class,
                'value'=>date('Y-m-d H:i:s'),
            ],
            BlameableBehavior::class,

        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'view_count', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'image', 'sub_text', 'description'], 'string', 'max' => 255],
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
            'id' => translate('ID'),
            'title' => translate('Title'),
            'image' => translate('Image'),
            'sub_text' => translate('Sub Text'),
            'description' => translate('Description'),
            'status' => translate('Status'),
            'view_count' => translate('View Count'),
            'created_by' => translate('Created By'),
            'created_at' => translate('Created At'),
            'updated_at' => translate('Updated At'),
            'updated_by' => translate('Updated By'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[PostCategoryLinkers]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\PostCategoryLinkerQuery
     */
    public function getPostCategoryLinkers()
    {
        return $this->hasMany(PostCategoryLinker::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostTagLinkers]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\PostTagLinkerQuery
     */
    public function getPostTagLinkers()
    {
        return $this->hasMany(PostTagLinker::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\query\PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\content\models\query\PostQuery(get_called_class());
    }
}
