<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 1 2024 18:26:6
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\forms;

use app\models\UserProfile;
use yii\base\Model;
use yii\web\UploadedFile;

class ProfileForm extends Model
{
    public UserProfile $model;

    public $firstName;

    public $lastName;

    public $username;

    public $email;

    public $avatar_path;

    public $phone_number;

    public $birthday;

    public function __construct(UserProfile $model, $config = [])
    {
        $this->model = $model;
        $this->email = $model->user->email;
        $this->username = $model->user->username;
        $this->phone_number = $model->phone_number;
        $this->birthday = $model->birthday;
        $this->avatar_path = $model->avatar_path;
        $this->firstName = $model->firstname;
        $this->lastName = $model->lastname;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['firstName', 'lastName', 'phone_number', 'birthday', 'username', 'avatar_path'], 'string'],
            [['email'], 'required'],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstName' => translate('Firstname'),
            'lastName' => translate('Lastname'),
            'avatar_path' => translate('Avatar Path'),
            'gender' => translate('Gender'),
            'phone_number' => translate('Phone number'),
            'birthday' => translate('Birthday'),
            'old_password' => translate('Old password'),
        ];
    }

    public function save(): bool
    {
        $model = $this->model;
        $user = $model->user;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->save();
        $model->firstname = $this->firstName;
        $model->phone_number = $this->phone_number;
        $model->birthday = $this->birthday;
        $model->lastname = $this->lastName;
        $model->avatar_path = $this->avatar_path;

//        $upload = UploadedFile::getInstance($this, 'avatar_path');
//        $name ='uploads/' .rand(10000, 99999). "." .$upload->extension;
//        $upload->saveAs($name);
//        $model->avatar_path = $name;

        return $model->save();
    }
}