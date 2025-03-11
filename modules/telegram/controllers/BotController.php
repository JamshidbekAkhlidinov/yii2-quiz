<?php
/*
 *  Jamshidbek Akhlidinov
 *   4 - 5 2024 19:22:59
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\controllers;

use app\models\TelegramCompany;
use app\models\TelegramBotUser;
use app\modules\admin\enums\StatusEnum;
use app\modules\telegram\base\BotMessageFrame;
use app\modules\telegram\enums\BotUserStepEnum;
use app\modules\telegram\enums\ButtonNamesEnum;
use app\modules\telegram\enums\LanguageEnum;
use app\modules\telegram\enums\MessageTypeEnum;
use app\modules\telegram\enums\UserOptionsDataEnum;
use app\modules\telegram\forms\UserSaveForm;
use app\modules\telegram\frames\AdminForwardAnswerFrame;
use app\modules\telegram\frames\AdminFrame;
use app\modules\telegram\frames\AdminSendedUserFrame;
use app\modules\telegram\frames\CodeInErrorFrame;
use app\modules\telegram\frames\LanguageFrame;
use app\modules\telegram\frames\LogoutAdminFrame;
use app\modules\telegram\frames\SelectedLanguageFrame;
use app\modules\telegram\frames\StartFrame;
use ustadev\telegram\BotApi;
use ustadev\telegram\Update;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class BotController extends Controller
{
    public $enableCsrfValidation = false;

    public TelegramCompany $company;
    public BotApi $botApi;

    public ?Update $update;

    public ?TelegramBotUser $telegramBotUser = null;

    public function init()
    {
        app()->response->format = Response::FORMAT_JSON;
    }

    public function beforeAction($action)
    {
        ob_start();
        return parent::beforeAction($action);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function registrationVariables($access_token)
    {
        $this->company = TelegramCompany::findOrFail([
            'bot_token' => $access_token,
            'status' => StatusEnum::ACTIVE
        ]);
        $this->botApi = new BotApi($this->company->bot_token);
        $webhookData = $this->botApi->getWebhookUpdate();
        $this->update = new Update($webhookData);

        if ($user = $this->getUser()) {
            $form = new UserSaveForm($this->company, $user);
            $this->telegramBotUser = $form->save();
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionIndex($access_token)
    {
        try {
            $this->registrationVariables($access_token);
            $company = $this->company;
            $admins = explode(",", $company->admin_ids);
            $bot = $this->botApi;
            $update = $this->update;
            $telegramBotUser = $this->telegramBotUser;
            $admin_url = $company->admin_url;
            $isAdmin = $telegramBotUser->is_admin;
            $isBlock = $telegramBotUser->is_block;

            $botInfo = $bot->getMe();
            $botUsername = $botInfo['result']['username'] ?? "no_username";
            $step = 0;
            if ($telegramBotUser) {
                $step = $telegramBotUser->step;
                $options = json_decode($telegramBotUser->options ?? "", true);
                $language = $options[UserOptionsDataEnum::language] ?? LanguageEnum::uzbek;
                app()->language = $language;
            }


            if ($update->isMessage()) {
                $message = $update->getMessage();
                $message_id = $message->getMessageId();
                $user = $message->getUser();
                $user_id = $user->getId();
                $text = $message->isText() ? $message->getText() : "";


                if ($isAdmin) {

                    if ($text == translateBotMessage(ButtonNamesEnum::logout_admin)) {
                        $this->sendFrame(
                            new LogoutAdminFrame()
                        );
                    } elseif ($text == '/admin' || translateBotMessage(ButtonNamesEnum::cancel_forward) == $text) {
                        $this->updateStep(BotUserStepEnum::done);
                        $this->sendFrame(
                            new AdminFrame(),
                        );
                    } elseif ($text == translateBotMessage(ButtonNamesEnum::forward_menu)) {
                        $this->sendFrame(
                            new AdminForwardAnswerFrame()
                        );
                        $this->updateStep(BotUserStepEnum::forward_message);
                    } elseif ($step == BotUserStepEnum::forward_message) {
                        $this->updateStep(BotUserStepEnum::done);
                        $users = $company->telegramBotUsers;
                        $count = 0;
                        foreach ($users as $user) {
                            $result = $bot->forwardMessage(
                                $user->telegram_user_id,
                                $user_id,
                                $message_id,
                            );
                            if (isset($result['ok']) && $result['ok']) {
                                $count++;
                            }
                        }
                        $this->sendFrame(
                            new AdminSendedUserFrame(['count' => $count])
                        );
                    }
                }

                if ($text == '/start') {
                    $this->sendFrame(
                        new StartFrame()
                    );
                    $this->updateStep(BotUserStepEnum::start);
                } elseif (($text == translateBotMessage(ButtonNamesEnum::change_language) || $text == "/language")) {
                    $this->sendFrame(
                        new LanguageFrame()
                    );
                } elseif (in_array($text, array_values(LanguageEnum::LABELS))) {
                    $language = LanguageEnum::KEYS[$text];
                    $stepU = BotUserStepEnum::start;
                    if ($step >= BotUserStepEnum::done) {
                        $stepU = BotUserStepEnum::done;
                    }
                    $this->updateStep(
                        $stepU,
                        [
                            'options' => [
                                UserOptionsDataEnum::language => $language
                            ]
                        ]
                    );
                    app()->language = $language;
                    $this->sendFrame(
                        new SelectedLanguageFrame()
                    );
                }
            }


            if ($update->isCallbackQuery()) {
                $callback = $update->getCallbackQuery();
                $callback_id = $callback->getId();
                $data = $callback->getData();
                $user = $callback->getUser();
                $user_id = $user->getId();
                $message_id = $callback->getMessage()->getMessageId();

                if (mb_stripos($data, 'order') !== false) {
                    print_r($data);
                }

            }


            if ($update->isChannelPost()) {
                $message = $update->getChannelPost();
                $message_id = $message->getMessageId();
                if ($message->isDocument()) {
                    $doc = $message->getDocument();
                    $fileName = $doc->getFileName();
                    print_r($fileName);
                }
            }

        } catch (\Exception $exception) {
            print_r($exception->getMessage());
            $this->sendFrame(
                new CodeInErrorFrame($exception),
                false,
                env('ERROR_MESSAGE_ID')
            );
        }

        echo "\n";
        return "Running bot ";
    }

    public function sendFrame(BotMessageFrame $frame, $isEdit = false, $chat_id = null)
    {
        $user_id = $this->getUser()->getId();
        if ($chat_id !== null) {
            $user_id = $chat_id;
        }
        $message_id = $this->getMessageId();
        $options = $frame->getOptions();
        if ($isEdit) {
            return $this->botApi->editMessageReplyMarkup(
                $user_id,
                $message_id,
                $frame->getReplyMarkup(),
                $options,
            );
        }

        if ($frame->message_type == MessageTypeEnum::media_group) {
            return $this->botApi->sendMediaGroup(
                $user_id,
                $frame->getMedia(),
                $options
            );
        } elseif ($frame->message_type == MessageTypeEnum::photo) {
            return $this->botApi->sendPhoto(
                $user_id,
                $frame->file_url,
                $options
            );
        } else if ($frame->message_type == MessageTypeEnum::video) {
            return $this->botApi->sendVideo(
                $user_id,
                $frame->file_url,
                $options
            );
        } else if ($frame->message_type == MessageTypeEnum::file) {
            return $this->botApi->sendDocument(
                $user_id,
                $frame->file_url,
                $options
            );
        } else
            return $this->botApi->sendMessage(
                $user_id,
                $frame->getMessage(),
                $options
            );
    }

    public function getUser()
    {
        $update = $this->update;
        $user = "";
        if ($update->isMessage()) {
            $user = $update->getMessage()->getUser();
        } elseif ($update->isCallbackQuery()) {
            $user = $update->getCallbackQuery()->getUser();
        } elseif ($update->isInlineQuery()) {
            $user = $update->getInlineQuery()->getUser();
        }
        return $user;
    }

    public function getMessageId()
    {
        $update = $this->update;
        if ($update->isMessage()) {
            $messageID = $update->getMessage()->getMessageId();
        } elseif ($update->isCallbackQuery()) {
            $messageID = $update->getCallbackQuery()->getMessage()->getMessageId();
        }
        return $messageID;
    }


    public function updateStep($step, $options = [])
    {
        $user = $this->telegramBotUser;
        $user->step = $step;
        if ($options) {
            foreach ($options as $key => $value) {
                if ($key == 'options') {
                    $userOptions = json_decode($user->options, true) ?? '';
                    $user->options = json_encode(
                        array_merge(
                            $userOptions,
                            $value
                        )
                    );
                } else {
                    $user->{$key} = $value;
                }
            }
        }
        $user->save();
    }
}