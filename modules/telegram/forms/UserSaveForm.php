<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 4 2024 21:17:24
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\forms;

use app\models\TelegramBotUser;
use app\models\TelegramCompany;
use app\modules\admin\enums\StatusEnum;
use app\modules\telegram\enums\BotUserStepEnum;
use app\modules\telegram\enums\LanguageEnum;
use app\modules\telegram\enums\UserOptionsDataEnum;
use ustadev\telegram\objects\User;
use yii\base\Model;

class UserSaveForm extends Model
{
    public User $botUser;
    public TelegramCompany $company;

    public function __construct(TelegramCompany $company, User $botUser, $config = [])
    {
        $this->botUser = $botUser;
        $this->company = $company;
        parent::__construct($config);
    }

    public function save()
    {
        $user = $this->botUser;
        $botUserModel = TelegramBotUser::findOne([
            'telegram_user_id' => $user->getId(),
            'telegram_company_id' => $this->company->id,
        ]);
        if (!$botUserModel) {
            $botUserModel = new TelegramBotUser([
                'telegram_user_id' => (string)$user->getId(),
                'telegram_company_id' => $this->company->id,
                'username' => $user->getUsername(),
                'balance' => 0,
                'is_admin' => StatusEnum::INACTIVE,
                'is_block' => StatusEnum::INACTIVE,
                'step' => BotUserStepEnum::null,
                'options' => json_encode([
                    UserOptionsDataEnum::language => LanguageEnum::uzbek,
                ])
            ]);
        }
        if (!$botUserModel->save()) {
            print_r($botUserModel->getErrors());
        }
        return $botUserModel;
    }
}