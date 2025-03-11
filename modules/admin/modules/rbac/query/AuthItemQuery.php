<?php

namespace app\modules\admin\modules\rbac\query;

use app\modules\admin\enums\AuthItemTypeEnum;
use app\modules\admin\enums\UserRolesEnum;
use Cassandra\Type\UserType;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\modules\rbac\models\AuthItem]].
 *
 * @see \app\modules\admin\modules\rbac\models\AuthItem
 */
class AuthItemQuery extends \yii\db\ActiveQuery
{
    public function roles()
    {
        return $this->andWhere(['type' => AuthItemTypeEnum::ROLE]);
    }

    public function permissions()
    {
        return $this->andWhere(['type' => AuthItemTypeEnum::PERMISSION]);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\rbac\models\AuthItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\rbac\models\AuthItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
