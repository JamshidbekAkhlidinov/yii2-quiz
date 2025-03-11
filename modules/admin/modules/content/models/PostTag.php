<?php

namespace app\modules\admin\modules\content\models;

use Yii;

/**
 * This is the model class for table "post_tag".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $deleted_at
 *
 * @property PostTagLinker[] $postTagLinkers
 */
class PostTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deleted_at'], 'safe'],
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
        ];
    }

    /**
     * Gets query for [[PostTagLinkers]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\admin\modules\content\models\query\PostTagLinkerQuery
     */
    public function getPostTagLinkers()
    {
        return $this->hasMany(PostTagLinker::class, ['tag_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\query\PostTagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\content\models\query\PostTagQuery(get_called_class());
    }
}
