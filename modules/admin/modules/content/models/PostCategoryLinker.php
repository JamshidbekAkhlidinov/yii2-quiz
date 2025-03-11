<?php

namespace app\modules\admin\modules\content\models;

use Yii;

/**
 * This is the model class for table "post_category_linker".
 *
 * @property int $id
 * @property int|null $post_category_id
 * @property int|null $post_id
 *
 * @property Post $post
 * @property PostCategory $postCategory
 */
class PostCategoryLinker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category_linker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_category_id', 'post_id'], 'integer'],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::class, 'targetAttribute' => ['post_category_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'post_category_id' => translate('Post Category ID'),
            'post_id' => translate('Post ID'),
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\PostQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    /**
     * Gets query for [[PostCategory]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\PostCategoryQuery
     */
    public function getPostCategory()
    {
        return $this->hasOne(PostCategory::class, ['id' => 'post_category_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\query\PostCategoryLinkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\content\models\query\PostCategoryLinkerQuery(get_called_class());
    }
}
