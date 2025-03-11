<?php

namespace app\models\query;

use app\models\User;
use yii\db\ActiveQuery;

class UserQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['status' => User::STATUS_ACTIVE]);
        return $this;
    }
}