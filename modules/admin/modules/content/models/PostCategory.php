<?php

namespace app\modules\admin\modules\content\models;

use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $sub_text
 * @property int|null $status
 * @property string|null $created_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 * @property PostCategoryLinker[] $postCategoryLinkers
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
                'updatedAtAttribute' => false,
            ],
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'image', 'sub_text'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'image' => translate('Image'),
            'sub_text' => translate('Sub Text'),
            'status' => translate('Status'),
            'created_at' => translate('Created At'),
            'created_by' => translate('Created By'),
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
        return $this->hasMany(PostCategoryLinker::class, ['post_category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\query\PostCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\content\models\query\PostCategoryQuery(get_called_class());
    }
}
