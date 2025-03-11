<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 1 2024 23:45:20
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class BaseController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'signup','auth'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['error', 'index','set-locale','about'],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ]
                ],
            ],
        ];
    }
}