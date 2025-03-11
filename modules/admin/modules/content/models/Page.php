<?php

namespace app\modules\admin\modules\content\models;

use app\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $slug
 * @property int|null $status
 * @property int|null $sidebar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => date('Y-m-d H:i:s'),
            ],
            [
                'class' => BlameableBehavior::class,
            ],
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'slug',
                'immutable' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'string'],
            [['status', 'sidebar', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
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
            'content' => translate('Content'),
            'slug' => translate('Slug'),
            'status' => translate('Status'),
            'sidebar' => translate('Sidebar'),
            'created_at' => translate('Created At'),
            'updated_at' => translate('Updated At'),
            'created_by' => translate('Created By'),
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
     * @return \app\modules\admin\modules\content\models\query\PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\modules\content\models\query\PageQuery(get_called_class());
    }
}
