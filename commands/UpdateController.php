<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 12 2023 9:34:57
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\commands;

use app\forms\CardForm;
use app\forms\TestForm;
use app\modules\admin\enums\LanguageEnum;
use app\modules\admin\forms\MessageForm;
use app\modules\admin\models\CardData;
use app\modules\admin\models\I18nSourceMessage;
use ustadev\telegram\proxy\Proxy;
use yii\console\Controller;

class UpdateController extends Controller
{
    public function actionTest()
    {
        $form = new TestForm();
        $form->save();
    }

    public function actionCard()
    {
        $form = new CardForm();
        $form->save();
    }

    public function actionCardRemove()
    {
        CardData::deleteAll('id>0');
    }

    public function actionBot()
    {
        $token = env('BOT_TOKEN');
        $url = "http://localhost:8080/telegram/bot?access_token=" . $token . "&XDEBUG_SESSION_START=1";

        $proxy = new Proxy($url, $token);
        $proxy->loop();
    }


    public function actionTranslate($isTranslate = false)
    {
        $path = \Yii::getAlias("@app/web/json/");
        if ($isTranslate) {
            $path .= "app.json";
        } else {
            $path .= "translate.json";
        }
        $file = file_get_contents($path);
        $array = json_decode($file, true);

        foreach ($array as $item) {
            $model = I18nSourceMessage::findOne(['category' => $item['category'], 'message' => $item['value']]);
            if (!$model) {
                $items = [];
                if ($isTranslate) {
                    foreach (LanguageEnum::LABELS as $key => $label) {
                        $items[$key] = googleTranslate($item['value'], $key);
                    }
                } else {
                    $items = $item['items'];
                }

                $form = new MessageForm(
                    new I18nSourceMessage(),
                    [
                        'category' => $item['category'],
                        'message' => $item['value'],
                        'items' => $items,
                    ]
                );
                echo $form->save();
                print_r($items);
                echo "\n";
            } else {
                echo $item['value'] . " -> exist\n";
            }
        }
    }


    public function actionUpdateJson()
    {
        $path = \Yii::getAlias("@app/web/json/translate.json");
        if (!file_exists($path)) {
            file_put_contents($path, "[]");
        }
        $file = file_get_contents($path);
        $array = json_decode($file, true);

        $translations = I18nSourceMessage::find()->all();
        foreach ($translations as $translation) {
            /**
             * @var $translation I18nSourceMessage
             */
            $array[$translation->message] = [
                'category' => $translation->category,
                'value' => $translation->message,
                'items' => array_column(
                    $translation->i18nMessages,
                    'translation',
                    'language'
                ),
            ];
        }
        file_put_contents($path, json_encode($array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}