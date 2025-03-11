<?php

namespace app\modules\admin\models\query;

use app\modules\admin\enums\StatusEnum;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\models\Answer]].
 *
 * @see \app\modules\admin\models\Answer
 */
class AnswerQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status' => StatusEnum::ACTIVE]);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\Answer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\Answer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
