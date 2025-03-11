<?php

use app\models\User;
use app\models\UserProfile;
use app\modules\admin\enums\UserRolesEnum;
use yii\db\Migration;

/**
 * Class m240215_070204_create_user_filler
 */
class m240215_070204_create_user_filler extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        foreach (UserRolesEnum::ALL as $key => $value) {
            try {
                $user = new User();
                $user->username = $key;
                $user->email = $key . "@gmail.com";
                $user->status = User::STATUS_ACTIVE;
                $user->setPassword($key);
                if ($user->save()) {
                    $role = $auth->createRole($key);
                    $auth->add($role);
                    if ($auth->assign($role, $user->id)) {
                        echo "\nok: " . $value;
                    }
                    $userProfile = new UserProfile([
                        'user_id' => $user->id,
                        'firstname' => $value,
                        'locale' => 'en',
                        'gender' => UserProfile::GENDER_MALE,
                    ]);
                    if ($userProfile->save()) {
                        echo "\nProfile Added:" . $value;
                    }
                }
            } catch (Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        foreach (UserRolesEnum::ALL as $key => $value) {
            try {
                if ($user = User::findOne(['username' => $key])) {
                    $auth->removeAll();
                    $user->delete();
                }
            } catch (Exception $e) {
                echo $e->getMessage() . "\n";
            }
        }
    }
}
