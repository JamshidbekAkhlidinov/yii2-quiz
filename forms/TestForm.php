<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 6 2024 20:31:51
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\Answer;
use app\modules\admin\models\Question;
use app\modules\admin\models\Subject;
use app\modules\admin\models\Test;
use yii\base\Model;

class TestForm extends Model
{
    public function save()
    {
        $web = \Yii::getAlias("@app/web/json/test");
        $files = scandir($web);
        unset($files['0'], $files[1]);

        foreach ($files as $fileN) {

            $file = file_get_contents($web . "/" . $fileN);
            $array = json_decode($file, true);

            $name = str_replace(".json", "", $fileN);
            $subject = Subject::findOne(['name' => $name]);
            if (!$subject) {
                $subject = new Subject(['name' => $name]);
            }
            if ($subject->save()) {
                $test = Test::findOne(['subject_id' => $subject->id]);
                if (!$test) {
                    $test = new Test([
                        'subject_id' => $subject->id,
                        'name' => "Kirish testi"
                    ]);
                }
                if ($test->save()) {
                    foreach ($array as $id => $item) {
                        $questionModel = new Question([
                            'subject_id' => $subject->id,
                            'test_id' => $test->id,
                            'text' => $item['question'],
                            'ball' => 1,
                        ]);
                        if ($questionModel->save()) {
                            foreach ($item['options'] as $key => $option) {
                                $answerModel = new Answer([
                                    'subject_id' => $subject->id,
                                    'test_id' => $test->id,
                                    'question_id' => $questionModel->id,
                                    'text' => $option,
                                    'correct_answer' => ($item['correct_answer'] == $key) ? StatusEnum::ACTIVE : StatusEnum::INACTIVE,
                                ]);
                                if (!$answerModel->save()) {
                                    print_r($answerModel->getErrors());
                                }
                            }
                        } else {
                            print_r($questionModel->getErrors());
                        }
                    }
                } else {
                    print_r($test->getErrors());
                }
            }

        }
    }
}