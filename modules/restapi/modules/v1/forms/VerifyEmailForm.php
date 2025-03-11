<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:40:32
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\forms;

use app\models\User;
use app\modules\restapi\base\BaseRequest;
use InvalidArgumentException;
use yii\web\HttpException;

class VerifyEmailForm extends BaseRequest
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var User
     */
    private $_user;


    /**
     * Creates a form model with given token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException|HttpException if token is empty or not valid
     */
    public function __construct($token, array $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new HttpException(422,'Verify email token cannot be blank.');
        }
        $this->_user = User::findByVerificationToken($token);
        if (!$this->_user) {
            throw new HttpException(422,'Wrong verify email token.');
        }
        parent::__construct($config);
    }

    public function getResult()
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        $isSave = $user->save(false) ? $user : null;
        if ($isSave) {
            return [
                'token' => $user->auth_key,
            ];
        }
        return $user;
    }
}