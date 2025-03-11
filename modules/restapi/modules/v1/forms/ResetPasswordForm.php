<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:39:0
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\models\User;
use app\modules\restapi\base\BaseRequest;
use InvalidArgumentException;
use Yii;
use yii\web\HttpException;

class ResetPasswordForm extends BaseRequest
{
    public $password;

    /**
     * @var $_user User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException|HttpException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new HttpException(422,'Password reset token cannot be blank.');
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new HttpException(422,'Wrong password reset token.');
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function getResult()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        $user->generateAccessToken();

        return $user->save(false);
    }
}