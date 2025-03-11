<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 6 2024 17:22:40
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\Answer;
use app\modules\admin\models\Question;
use yii\base\Model;

class QuestionForm extends Model
{
    public Question $model;
    /**
     * @var mixed
     */
    public $subject_id;
    public $test_id;
    public $text;
    public $status;
    public $ball;

    public $items;

    public function __construct(Question $model, $config = [])
    {
        $this->model = $model;
        $this->subject_id = $model->subject_id;
        $this->test_id = $model->test_id;
        $this->text = $model->text;
        $this->status = $model->status;
        $this->ball = $model->ball;
        $this->items = $this->initItems();
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['subject_id', 'test_id', 'status'], 'integer'],
            [['text'], 'string'],
            [['ball'], 'number'],
            //['items', 'required'],
            ['items', 'validateItems'],
        ];
    }

    public function validateItems($attribute)
    {
        $attributeValue = $this->{$attribute};
        if (count($attributeValue) == 1) {
            return;
        }
        $answers = array_column($attributeValue, 'correct_answer');
        $correctAnswerSum = array_sum($answers);

        if ($correctAnswerSum > 0) {
            return;
        }

        $this->addError($attribute, translate("Please enter correct answer"));
    }


    public function attributeLabels()
    {
        return $this->model->attributeLabels();
    }

    public function save()
    {
        $model = $this->model;
        //$model->subject_id = $this->subject_id;
        //$model->test_id = $this->test_id;
        $model->text = $this->text;
        $model->status = $this->status;
        $model->ball = $this->ball;

        $isSave = $model->save();

        if ($isSave) {
            $this->saveItems($model);
        }

        return $isSave;
    }

    private function saveItems(Question $model)
    {
        Answer::updateAll(
            ['status' => StatusEnum::INACTIVE],
            ['question_id' => $model->id]
        );
        foreach ($this->items ?? [] as $item) {
            $answerModel = Answer::findOne($item['answer_id'] ?? 0);
            if (!$answerModel) {
                $answerModel = new Answer([
                    'question_id' => $model->id,
                    'subject_id' => $model->subject_id
                ]);
            }
            $answerModel->test_id = $model->test_id;
            $answerModel->text = $item['text'];
            $answerModel->correct_answer = $item['correct_answer'];
            $answerModel->status = StatusEnum::ACTIVE;
            $answerModel->save();
        }
    }

    private function initItems()
    {
        $items = [];
        foreach ($this->model->getAnswers()->active()->all() as $answer) {
            $items[] = [
                'text' => $answer->text,
                'correct_answer' => $answer->correct_answer,
                'answer_id' => $answer->id,
            ];
        }
        return $items;
    }
}