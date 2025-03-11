<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:37:51
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\models\User;
use app\modules\restapi\base\BaseRequest;
use Yii;

class ResendVerificationEmailForm extends BaseRequest
{
    /**
     * @var string
     */
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => User::class,
                'filter' => ['status' => User::STATUS_NOT_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }

    public function getResult()
    {
        $user = User::findOne([
            'email' => $this->email,
            'status' => User::STATUS_NOT_ACTIVE
        ]);

        if ($user === null) {
            return false;
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}