<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 8 2024 9:39:53
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\forms;

use app\modules\admin\enums\CardDataTypeEnum;
use app\modules\admin\models\CardData;
use app\modules\admin\models\Subject;
use yii\base\Model;

class CardForm extends Model
{
    public function save()
    {
        $web = \Yii::getAlias("@app/web/json/card");
        $files = scandir($web);
        unset($files['0'], $files[1]);

        foreach ($files as $fileN) {

            $file = file_get_contents($web . "/" . $fileN);
            $array = json_decode($file, true);

            $name = str_replace(".json", "", $fileN);
            $subject = Subject::findOne(['name' => $name]);
            if ($subject) {
                foreach ($array as $value) {
                    $data = new CardData(['text' => $value['question'] ?? ""]);
                    $data->subject_id = $subject->id;
                    $data->type = CardDataTypeEnum::ISSUE;
                    echo $data->save();
                }
            }
        }
    }
}