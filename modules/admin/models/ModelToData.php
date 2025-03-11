<?php
/*
 *   Jamshidbek Akhlidinov
 *   29 - 11 2023 18:49:27
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\models;

use app\models\TelegramCompany;
use app\models\User;
use app\modules\admin\enums\UserRolesEnum;
use app\modules\admin\modules\rbac\models\AuthItem;
use app\modules\admin\modules\rbac\models\AuthRule;
use yii\helpers\ArrayHelper;

class ModelToData
{

    public static function getAuthItems()
    {
        return ArrayHelper::map(
            AuthItem::find()->all(),
            'name',
            'name',
        );
    }

    public static function getUsers()
    {
        return ArrayHelper::map(
            User::find()->all(),
            'id',
            'username',
        );
    }

    public static function getAuthRule()
    {
        return ArrayHelper::map(
            AuthRule::find()->all(),
            'name',
            'name',
        );
    }

    public static function getTelegramCompany()
    {
        return ArrayHelper::map(
            TelegramCompany::find()->all(),
            'id',
            'name',
        );
    }


    public static function getSubject()
    {
        $query = Subject::find();
        if (can(UserRolesEnum::ROLE_MANAGER)) {
            $query->andWhere(['created_by' => user()->getId()]);
        }
        return ArrayHelper::map(
            $query->all(),
            'id',
            'name'
        );
    }

    public static function getTest($subject_id = null, $id = null)
    {
        $model = Test::find();
        $model->andFilterWhere(['subject_id' => $subject_id]);
        $model->andFilterWhere(['id' => $id]);
        $now = date('Y-m-d H:i:s');
        $model->andWhere(['<', "started_at", $now]);
        $model->andWhere(['>', 'ended_at', $now]);

        if (can(UserRolesEnum::ROLE_MANAGER)) {
            $model->andWhere(['created_by' => user()->getId()]);
        }
        return ArrayHelper::map(
            $model->all(),
            'id',
            function (Test $model) {
                return $model->name . " " . date('d-m-Y H:i', strtotime($model->started_at)) . " - " . date('d-m-Y H:i', strtotime($model->ended_at));
            },
        );
    }

    public static function getSelectedTest()
    {
        $query = SelectedTest::find();
        if (can(UserRolesEnum::ROLE_MANAGER)) {
            $query->andWhere(['created_by' => user()->getId()]);
        }
        return ArrayHelper::map(
            $query->all(),
            'id',
            'name'
        );
    }
}