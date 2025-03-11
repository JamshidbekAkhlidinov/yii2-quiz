<?php

namespace app\modules\admin\modules\content\models\query;

use app\modules\admin\enums\LandingElementEnum;
use app\modules\admin\enums\StatusEnum;
use app\modules\admin\modules\landingElement\models\LandingElement;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\modules\content\models\Post]].
 *
 * @see \app\modules\admin\modules\content\models\Post
 */
class PostQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(StatusEnum::ACTIVE);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\Post[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\Post|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
