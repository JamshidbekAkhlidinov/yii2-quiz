<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:14:28
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1\resources;

use app\models\User;

class UserResource extends User
{
    public function fields(): array
    {
        return [
            'id',
            'username',
            'email',
            //'auth_key',
            'status',
            'status' => static function (User $model) {
                return User::statuses()[$model->status] ?? '';
            },
            'first_name',
            'last_name',
            'patronymic',
            'full_name',
            'created_at',
        ];
    }
}