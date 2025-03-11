<?php

namespace app\modules\admin\modules\content\forms;

use app\modules\admin\modules\content\models\PostTag;
use Yii;
use yii\base\Model;

class PostTagForm extends Model
{
    public PostTag $model;

    public ?string $name;

    public function __construct(PostTag $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            ['name', 'string'],
            ['name', 'required'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => translate('ID'),
            'name' => translate('Name'),
        ];
    }

    public function save(): bool
    {

        $model = $this->model;
        $tags =  explode(",",$this->name);
        if($model->isNewRecord){
            foreach ($tags as $tag){
                $model = new PostTag();
                $model->name = trim($tag);
                $model->save();
            }
        }else{
            $model->name = $this->name;
            $model->save();
        }

        return true;
    }

}