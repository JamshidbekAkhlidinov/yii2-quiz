<?php

namespace app\modules\admin\modules\landingElement\models\query;

use app\modules\admin\modules\landingElement\models\LandingElement;

/**
 * This is the ActiveQuery class for [[LandingElement]].
 *
 * @see LandingElement
 */
class LandingElementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LandingElement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LandingElement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
