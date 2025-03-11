<?php

namespace app\modules\admin\modules\content\models;

use Yii;

/**
 * This is the model class for table "post_tag_linker".
 *
 * @property int $id
 * @property int|null $tag_id
 * @property int|null $post_id
 *
 * @property Post $post
 * @property PostTag $tag
 */
class PostTagLinker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_tag_linker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_id', 'post_id'], 'integer'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostTag::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => translate('ID'),
            'tag_id' => translate('Tag ID'),
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
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\PostTagQuery
     */
    public function getTag()
    {
        return $this->hasOne(PostTag::class, ['id' => 'tag_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\query\PostTagLinkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\content\models\query\PostTagLinkerQuery(get_called_class());
    }
}
