<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:48:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\forms;

use app\models\User;
use yii\base\Model;
use yii\web\JsExpression;

class UserProfileForm extends Model
{
    public User $model;

    public $old_password;
    public $password;
    public $confirm_password;


    public function __construct(User $model, $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }

    public function rules()
    {
        return [

            [['old_password', 'password'], 'string'],
            [
                ['old_password','confirm_password'],
                'required',
                'when' => function ($model) {
                    return !empty($model->password);
                },
                'whenClient' => new JsExpression("function (attribute, value) {
                    return $('#userprofileform-password').val().length > 0;
                }")
            ],
            ['old_password', 'validateOldPassword'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => translate("Passwords do not match"), 'skipOnEmpty' => false],
        ];
    }

    public function validateOldPassword($attribute)
    {
        $oldPassword = $this->{$attribute};
        if (!$this->model->validatePassword($oldPassword)) {
            $this->addError($attribute, translate("Old password error!!"));
        }
        return;
    }


    public function save()
    {
        $model = $this->model;
        if ($password = $this->password) {
            $model->setPassword($password);
        }
        return $model->save();
    }

}