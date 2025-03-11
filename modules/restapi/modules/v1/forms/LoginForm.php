<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:14:4
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\modules\admin\enums\UserRolesEnum;
use app\modules\restapi\base\FormRequest;
use app\modules\restapi\modules\v1\resources\UserResource;
use yii\web\ForbiddenHttpException;

class LoginForm extends FormRequest
{
    public $username;

    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [
                ['username'],
                function ($attribute) {
                    $user = $this->findUser();

                    if ($user === null || !$user->validatePassword($this->password)) {
                        $this->addError(
                            $attribute,
                            translate("Username or password is not correct")
                        );
                        return;
                    }
                }
            ]
        ];
    }

    public function findUser()
    {
        return UserResource::findOne([
            'username' => $this->username,
            'status' => UserResource::STATUS_ACTIVE,
        ]);
    }

    /**
     * @throws ForbiddenHttpException
     */
    public function getResult()
    {
        $user = $this->findUser();
        user()->setIdentity($user);
        if (user()->can(UserRolesEnum::ROLE_ADMINISTRATOR)) {
            $user->generateAccessToken();
            $user->save();
            return [
                'token' => $user->access_token,
            ];
        }
        throw new ForbiddenHttpException('You are not allowed to access this page.');
    }
}