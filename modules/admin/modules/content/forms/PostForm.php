<?php

namespace app\modules\admin\modules\content\forms;

use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\models\PostCategoryLinker;
use app\modules\admin\modules\content\models\PostTagLinker;
use Yii;
use yii\base\Model;

class PostForm extends Model
{
    public Post $model;
    public $title;
    public $image;
    public $sub_text;
    public $description;
    public $status;
    public $publish_at;

    public $tags;
    public $categories;

    public function __construct(Post $model, $config = [])
    {
        $this->model = $model;
        $this->title = $model->title;
        $this->image = $model->image;
        $this->sub_text = $model->sub_text;
        $this->description = $model->description;
        $this->status = $model->status;
        $this->publish_at = $model->publish_at;
        $this->tags = $this->initTags();
        $this->categories = $this->initCategories();
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title', 'sub_text', 'description', 'image', 'publish_at'], 'string'],
            [['tags', 'categories'], 'safe'],
            [['tags', 'categories', 'publish_at'], 'required'],
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
            'publish_at' => translate('Publish At'),
        ];
    }

    public function save()
    {

        $model = $this->model;
        $model->title = $this->title;
        $model->image = $this->image;
        $model->sub_text = $this->sub_text;
        $model->description = $this->description;
        $model->status = $this->status;
        $model->publish_at = $this->publish_at;

        $isSave = $model->save();

        if ($isSave) {
            $this->saveTags();
            $this->saveCategories();
        }

        return $isSave;

    }

    private function initTags()
    {
        $linker = PostTagLinker::find()->andWhere([
            'post_id' => $this->model->id
        ])->all();
        return array_column($linker, 'tag_id');
    }

    private function initCategories()
    {
        $linker = PostCategoryLinker::find()->andWhere([
            'post_id' => $this->model->id
        ])->all();
        return array_column($linker, 'post_category_id');
    }

    private function saveTags()
    {
        $model = $this->model;
        if ($tags = $this->tags) {
            PostTagLinker::deleteAll(['post_id' => $model->id]);
            foreach ($tags as $tag) {
                $tagModel = new PostTagLinker([
                    'post_id' => $model->id,
                    'tag_id' => $tag,
                ]);
                $tagModel->save();
            }
        }
    }

    private function saveCategories()
    {
        $model = $this->model;
        if ($categories = $this->categories) {
            PostCategoryLinker::deleteAll(['post_id' => $model->id]);
            foreach ($categories as $category) {
                $tagModel = new PostCategoryLinker([
                    'post_id' => $model->id,
                    'post_category_id' => $category
                ]);
                $tagModel->save();
            }
        }
    }
}