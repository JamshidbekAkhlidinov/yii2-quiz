<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 12 2023 15:39:47
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\modules\admin\controllers;

use app\modules\admin\forms\ProfileForm;
use app\modules\admin\forms\UserProfileForm;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        return $this->render('view');
    }

    public function actionUpdate()
    {
        $form = new UserProfileForm(
            user()->identity,
        );
        if ($form->load(post()) && $form->validate() && $form->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('form', [
            'model' => $form
        ]);
    }

    public function actionUpdateData()
    {
        $form = new ProfileForm(
            user()->identity->userProfile,
        );
        $password_form = new UserProfileForm(
            user()->identity
        );

        if ($form->load(post()) && $form->validate() && $form->save()) {
            return $this->redirect(['index']);
        }

        if ($password_form->load(post()) && $password_form->validate() && $password_form->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('data', [
            'model' => $form,
            'password_form' => $password_form
        ]);
    }
}