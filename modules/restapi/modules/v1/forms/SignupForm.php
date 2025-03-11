<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:23:37
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\models\User;
use app\models\UserProfile;
use app\modules\restapi\base\FormRequest;
use Yii;
use yii\debug\models\search\Profile;

class SignupForm extends FormRequest
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $patronymic;
    public $full_name;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            //['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['first_name', 'last_name', 'patronymic', 'full_name'], 'string'],
        ];
    }

    public function getResult()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $profile = new UserProfile();
        $profile->firstname = $this->first_name;
        $profile->lastname = $this->last_name;
        $profile->save();
        $user->setPassword($this->password);
        $user->generateAccessToken();
        $user->generateEmailVerificationToken();

        if ($user->save() && $this->sendEmail($user)) {
            return [
                'success' => true,
                'message' => "Checked your email address"
            ];
        }
        return $user;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
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