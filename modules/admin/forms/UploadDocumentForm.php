<?php

namespace app\modules\admin\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\Answer;
use app\modules\admin\models\Question;
use app\modules\admin\models\Subject;
use app\modules\admin\models\Test;
use Shuchkin\SimpleXLSX;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadDocumentForm extends Model
{
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 'extensions' => ['xlsx', 'xls']],
            [['file'], 'required'],
        ];
    }

    public function save()
    {
        $file = UploadedFile::getInstance($this, 'file');
        $path = Yii::getAlias("@app/web/docs/" . $file->name);
        if ($file->saveAs($path)) {
            if ($xlsx = SimpleXLSX::parse($path)) {
                $rows = $xlsx->rows();
                $subject_name = $rows[0]['1'];
                $subjectModel = Subject::findOne(['name' => $subject_name, 'created_by' => user()->id]);
                if (!$subjectModel) {
                    $subjectModel = new Subject(['name' => $subject_name]);
                    $subjectModel->save();
                }

                $test_name = $rows[1]['1'];
                $testModel = Test::findOne([
                    'subject_id' => $subjectModel->id,
                    'name' => $test_name,
                    'created_by' => user()->id,
                ]);
                if (!$testModel) {
                    $testModel = new Test([
                        'subject_id' => $subjectModel->id,
                        'name' => $test_name,
                        'status' => StatusEnum::INACTIVE
                    ]);
                    $testModel->save();
                }
                unset($rows[0], $rows[1], $rows[2]);

                foreach ($rows as $row) {
                    $question = $row[0];
                    $options = [
                        1 => $row[1],
                        2 => $row[2],
                        3 => $row[3],
                        4 => $row[4],
                    ];
                    $correctAnswer = $row[5];

                    $questionModel = new Question([
                        'subject_id' => $testModel->subject_id,
                        'test_id' => $testModel->id,
                        'text' => $question,
                        'status' => StatusEnum::ACTIVE,
                        'ball' => 1,
                    ]);

                    if ($questionModel->save()) {
                        foreach ($options as $index => $option) {
                            $answerModel = new Answer([
                                'subject_id' => $subjectModel->id,
                                'test_id' => $testModel->id,
                                'question_id' => $questionModel->id,
                                'text' => $option,
                                'correct_answer' => ($index == $correctAnswer) ? StatusEnum::ACTIVE : StatusEnum::INACTIVE,
                                'status' => StatusEnum::ACTIVE,
                            ]);
                            $answerModel->save();
                        }
                    }

                }
            } else {
                echo SimpleXLSX::parseError();
            }
            return true;
        }
        return false;
    }
}