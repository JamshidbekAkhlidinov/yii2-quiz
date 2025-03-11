<?php
/*
 *   Jamshidbek Akhlidinov
 *   6 - 7 2024 16:21:11
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\user\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\models\Answer;
use app\modules\admin\models\UserTestItem;
use yii\base\Model;

class CheckedAnswerForm extends Model
{
    public $test_id;
    public $selectedItems;

    public UserTestItem $model;

    public function __construct(UserTestItem $model, $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['test_id', 'selectedItems'], 'safe']
        ];
    }

    public function save()
    {
        $testModel = $this->model;
        $selectedAnswers = $this->selectedItems;
        $isSave = false;
        if ($testModel->userTest->status == StatusEnum::ACTIVE) {
            $questionModel = $testModel->question;
            $answerModels = $questionModel->getAnswers()
                ->active()
                ->all();
            /**
             * @var $answerModel Answer
             */
            $countTrueAnswers = 0;
            $isTrueAnswerCount = 0;
            $selectedAnswerIds = [];
            foreach ($answerModels as $answerModel) {
                if ($answerModel->correct_answer) {
                    if (in_array($answerModel->id, $selectedAnswers)) {
                        $isTrueAnswerCount++;
                    }
                    $countTrueAnswers++;
                }
                if (in_array($answerModel->id, $selectedAnswers)) {
                    $selectedAnswerIds[] = $answerModel->id;
                }
            }

            $isTrue = $countTrueAnswers == $isTrueAnswerCount;
            $testModel->is_true = $isTrue ? StatusEnum::ACTIVE : StatusEnum::INACTIVE;
            $testModel->select_answer = json_encode($selectedAnswerIds);
            //$testModel->select_answer_id = $answer_id;
            if (!$isSave = $testModel->save()) {
                print_r($testModel->getErrors(),
                    $countTrueAnswers,
                    $isTrueAnswerCount);
            }
        }
        return $isSave;
    }
}