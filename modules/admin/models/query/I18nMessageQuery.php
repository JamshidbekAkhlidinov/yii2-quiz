<?php

namespace app\modules\admin\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\models\I18nMessage]].
 *
 * @see \app\modules\admin\models\I18nMessage
 */
class I18nMessageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\I18nMessage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\models\I18nMessage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
