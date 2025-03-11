<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:12:42
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\controllers;

use app\modules\restapi\controllers\BaseController;
use app\modules\restapi\modules\v1\forms\LoginForm;
use app\modules\restapi\modules\v1\forms\PasswordResetRequestForm;
use app\modules\restapi\modules\v1\forms\ResendVerificationEmailForm;
use app\modules\restapi\modules\v1\forms\ResetPasswordForm;
use app\modules\restapi\modules\v1\forms\SignupForm;
use app\modules\restapi\modules\v1\forms\VerifyEmailForm;
use InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;

class AuthController extends BaseController
{
    public function actionLogin()
    {
        if (!user()->isGuest) {
            return translate("You need before logout");
        }

        $model = new LoginForm();
        return $this->sendResponse(
            $model,
            post(),
        );
    }

    public function actionLogout()
    {
        if ($user = user()->identity) {
            $user->generateAccessToken();
            return $user->save();
        }
        return false;
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        return $this->sendResponse(
            $model,
            post(),
        );
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        return $this->sendResponse(
            $model,
            post(),
        );
    }

    /**
     * @throws HttpException
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($code)
    {
        try {
            $model = new ResetPasswordForm($code);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        return $this->sendResponse(
            $model,
            post(),
        );
    }

    /**
     * @throws HttpException
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($code): \app\modules\restapi\base\BaseRequest
    {
        try {
            $model = new VerifyEmailForm($code);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        return $this->sendResponse(
            $model,
            post(),
        );
    }


    public function actionResendVerificationEmail(): \app\modules\restapi\base\BaseRequest
    {
        $model = new ResendVerificationEmailForm();

        return $this->sendResponse(
            $model,
            post(),
        );
    }
}