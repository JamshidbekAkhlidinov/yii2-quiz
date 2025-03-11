<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 6 2024 16:24:37
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\user\forms;

use app\modules\admin\enums\StatusEnum;
use app\modules\admin\enums\TestResultStatusEnum;
use app\modules\admin\models\Test;
use app\modules\admin\models\UserTest;
use app\modules\admin\models\UserTestItem;
use yii\base\Model;

class UserTestForm extends Model
{
    public $subject_id;
    public $test_id;

    public $selected_test_id;

    public $model_id;

    public function rules()
    {
        return [
            [['subject_id', 'test_id'], 'safe'],
            [['selected_test_id'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'subject_id' => translate("Subject"),
            'test_id' => translate("Test"),
            'selected_test_id' => translate("Selected Test"),
        ];
    }


    public function save()
    {
        $testModel = Test::findOne($this->test_id);
        $now = date('Y-m-d H:i:s');
        if (!($testModel->started_at < $now && $testModel->ended_at > $now)) {
            return false;
        }
        $conditions = [
            'subject_id' => $this->subject_id,
            'test_id' => $this->test_id,
            'selected_test_id' => $this->selected_test_id,
            'status' => StatusEnum::ACTIVE,
            'user_id' => user()->id,
        ];
        $model = UserTest::findOne($conditions);

        if (!$model) {
            $model = new UserTest($conditions);
            $model->created_at = date('Y-m-d H:i:s');
            $model->expired_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $model->status = TestResultStatusEnum::ACTIVE;
            if ($model->save()) {

                if ($this->selected_test_id) {
                    $selectedItems = $model->selectedTest->getSelectedTestItems()->active()->all();
                    $order = 0;
                    foreach ($selectedItems as $selectedItem) {
                        if ($subject = $selectedItem->subject) {
                            $questions = $subject->getQuestions()
                                ->orderBy('RAND()')
                                ->limit($selectedItem->count)
                                ->all();
                            foreach ($questions as $test) {
                                $order++;
                                $itemModel = new UserTestItem([
                                    'user_test_id' => $model->id,
                                    'question_id' => $test->id,
                                    'order' => $order,
                                ]);
                                if (!$itemModel->save()) {
                                    dd($itemModel->getErrors());
                                }
                            }
                        }
                    }
                } elseif ($this->subject_id && $this->test_id) {
                    $tests = $model->test->getQuestions()
                        ->orderBy('RAND()')
                        ->all();
                    foreach ($tests as $order => $test) {
                        $itemModel = new UserTestItem([
                            'user_test_id' => $model->id,
                            'question_id' => $test->id,
                            'order' => $order + 1,
                        ]);
                        if (!$itemModel->save()) {
                            dd($itemModel->getErrors());
                        }
                    }
                }
            }
            $model->expired_at = date('Y-m-d H:i:s', strtotime("+" . ($order + 1) * 2 . ' min'));
            $model->save();
        }
        $this->model_id = $model->id;
        return true;
    }
}