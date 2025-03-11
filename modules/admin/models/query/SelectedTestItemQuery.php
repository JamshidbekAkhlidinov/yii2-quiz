<?php

namespace app\modules\admin\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\models\SelectedTestItem]].
 *
 * @see \app\modules\admin\models\SelectedTestItem
 */
class SelectedTestItemQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\SelectedTestItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\SelectedTestItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
