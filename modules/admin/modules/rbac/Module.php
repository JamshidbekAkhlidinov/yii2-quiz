<?php

namespace app\modules\admin\modules\rbac;

use app\modules\admin\enums\UserRolesEnum;
use yii\filters\AccessControl;

/**
 * rbac module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\modules\rbac\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [
                            UserRolesEnum::ROLE_ADMINISTRATOR,
                        ],
                    ],
                ],
            ],
        ];
    }
}
