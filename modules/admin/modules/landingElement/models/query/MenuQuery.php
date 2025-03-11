<?php

namespace app\modules\admin\modules\landingElement\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\modules\landingElement\models\Menu]].
 *
 * @see \app\modules\admin\modules\landingElement\models\Menu
 */
class MenuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\landingElement\models\Menu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\landingElement\models\Menu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
