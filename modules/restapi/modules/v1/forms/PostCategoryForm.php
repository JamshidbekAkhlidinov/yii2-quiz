<?php
/*
 *  Jamshidbek Akhlidinov
 *   15 - 3 2024 15:21:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\modules\content\models\PostCategory;
use app\modules\restapi\base\FormRequest;
use Yii;
use yii\web\UploadedFile;

class PostCategoryForm extends FormRequest
{
    public $name;
    public $image;
    public $sub_text;
    public $status = StatusEnum::ACTIVE;

    public PostCategory $model;

    public function __construct(PostCategory $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        $this->image = $model->image;
        $this->sub_text = $model->sub_text;
        $this->status = $model->status;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['name', 'sub_text'], 'required'],
            [['image'], 'file'],
            [['status'], 'default', 'value' => StatusEnum::ACTIVE]
        ];
    }

    public function getResult()
    {
        $model = $this->model;
        $model->name = $this->name;

        $uploadFile = UploadedFile::getInstanceByName('image');
        if ($uploadFile) {
            $model->image = "/uploads/" . $uploadFile->baseName . '.' . $uploadFile->extension;
            $uploadFile->saveAs(Yii::getAlias("@app/web") . $model->image);
        }
        $model->sub_text = $this->sub_text;
        $model->status = $this->status;

        if ($model->save()) {
            return true;
        }
        return $model;
    }
}