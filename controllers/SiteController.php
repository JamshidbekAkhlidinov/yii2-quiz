<?php

namespace app\controllers;

use app\forms\LoginForm;
use app\forms\SignupForm;
use app\modules\admin\actions\SetLocaleAction;
use app\modules\admin\enums\LanguageEnum;
use app\modules\admin\enums\UserRolesEnum;
use Yii;
use yii\authclient\AuthAction;
use yii\base\Exception;
use yii\helpers\Json;
use yii\web\Response;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'set-locale' => [
                'class' => SetLocaleAction::class,
                'locales' => array_keys(LanguageEnum::LABELS),
                'localeCookieName' => 'lang',
            ],
            'auth' => ['class' => AuthAction::class,
                'successCallback' => [$this, 'successOAuthCallback']
            ]
        ];
    }

    public function successOAuthCallback($client)
    {
        //(new AuthHandler($client))->handle();
        $name = get('authclient');
        echo "<pre>";
        $attributes = $client->getUserAttributes();
        file_put_contents(rand(1, 99) . $name . ".json", Json::encode($attributes,));
        print_r($attributes);
        exit();
    }

    public function actionLogin()
    {
        //$this->layout = 'auth';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (!user()->can(UserRolesEnum::ROLE_USER)) {
                return $this->redirect(['/admin']);
            }
            return $this->goBack();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        user()->logout();
        return $this->goHome();
    }


    /**
     * @throws Exception
     */
    public function actionSignup()
    {
        //$this->layout = 'auth';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                Yii::$app->getUser()->login($user);
                $user->logged_at = date('Y-m-d H:i:s');
                $user->save();
                if($model->is_teacher){
                    return  $this->redirect(['admin/default/index']);
                }
                return $this->goBack();
            }
        }
        return $this->render('signup', [
            'model' => $model
        ]);
    }

    public function actionIndex()
    {
        if (!user()->isGuest) {
            return $this->redirect(['/user']);
        }
        return $this->redirect(['site/login']);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
