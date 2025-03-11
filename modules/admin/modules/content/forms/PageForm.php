<?php
/*
 *   Jamshidbek Akhlidinov
 *   11 - 2 2024 13:17:2
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\modules\content\forms;

use app\modules\admin\modules\content\models\Page;
use yii\base\Model;

class PageForm extends Model
{
    public Page $model;
    public $title;
    public $content;
    public $slug;
    public $status;
    public $sidebar;


    public function __construct(Page $model, $config = [])
    {
        $this->model = $model;
        $this->title = $model->title;
        $this->content = $model->content;
        $this->slug = $model->slug;
        $this->status = $model->status;
        $this->sidebar = $model->sidebar;
        parent::__construct($config);
    }


    public function rules()
    {
        return [
            [['title', 'content'], 'string'],
            [['status', 'sidebar'], 'integer'],
            [['slug'], 'string', 'max' => 255],
            [['slug'], 'unique',],
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

    public function save()
    {
        $model = $this->model;
        $model->title = $this->title;
        $model->content = $this->content;
        $model->slug = $this->slug;
        $model->status = $this->status;
        $model->sidebar = $this->sidebar;

        return $model->save();
    }
}