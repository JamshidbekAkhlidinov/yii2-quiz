<?php

namespace app\modules\admin\modules\content\forms;

use app\modules\admin\modules\content\models\PostCategory;
use yii\base\Model;

class PostCategoryForm extends Model
{
    public PostCategory $model;

    public $name;
    public $image;
    public $sub_text;
    public $status;

    public function __construct(PostCategory $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        $this->image = $model->image;
        $this->sub_text = $model->sub_text;
        $this->status = $model->status;
        parent::__construct($config);
    }

    public function save()
    {
        $model = $this->model;
        $model->name = $this->name;
        $model->image = $this->image;
        $model->sub_text = $this->sub_text;
        $model->status = $this->status;

        return $model->save();
    }


    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name', 'image', 'sub_text'], 'string', 'max' => 255],
            [['name'], 'required'],
        ];
    }

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


}