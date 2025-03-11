<?php
/*
 *   Jamshidbek Akhlidinov
 *   2 - 7 2024 1:4:34
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\user\forms;

use app\modules\admin\enums\TestResultStatusEnum;
use app\modules\admin\models\UserTest;
use yii\base\Model;

class CalculateBallForm extends Model
{
    public UserTest $model;

    public function __construct(UserTest $model, $config = [])
    {
        $this->model = $model;
        parent::__construct($config);
    }

    public function save()
    {
        $model = $this->model;

        $items = $model->getUserTestItems()
            ->all();
        $allBall = 0;
        $allTestCount = 0;

        $solveBall = 0;
        $solveTestCount = 0;

        foreach ($items as $item) {
            $question = $item->question;
            $allBall += $question->ball;
            $allTestCount++;

            if ($item->is_true) {
                $solveBall += $question->ball;
                $solveTestCount++;
            }
        }
        $model->solve_ball = $solveBall;
        $model->solve_count = $solveTestCount;
        $model->total_ball = $allBall;
        $model->total_count = $allTestCount;

        $present = ($model->solve_ball * 100) / $model->total_ball;
        if ($present >= 60) {
            $model->status = TestResultStatusEnum::SUCCESS;
        } else {
            $model->status = TestResultStatusEnum::FAIL;
        }

        return $model->save();
    }
}