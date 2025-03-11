<?php

namespace app\modules\restapi\controllers;

use app\modules\restapi\base\BaseRequest;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\filters\RateLimiter;
use yii\rest\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
        'linksEnvelope' => 'links',
        'metaEnvelope' => 'options',
    ];


    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'rateLimiter' => [
                'class' => RateLimiter::class,
            ],
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => null,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Expose-Headers' => [
                        'X-Pagination-Total-Count',
                        'X-Pagination-Page-Count',
                        'X-Pagination-Current-Page',
                        'X-Pagination-Per-Page',
                        'Link',
                    ],
                ],
            ],
            'authenticator' => [
                'class' => HttpBearerAuth::class,
                'except' => [
                    'login', 'signup', 'ok', 'error', 'index',
                    'json-schema', 'docs'
                ],
            ],
        ];
    }

    public function init()
    {
        parent::init();
        \Yii::$app->response->format = Response::FORMAT_JSON;
        \Yii::$app->language = 'uz';
    }

    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH'],
            'delete' => ['DELETE'],
        ];
    }

    public function actionOk()
    {
        return [
            'success' => true,
            'method' => 'OPTIONS'
        ];
    }

    public function sendResponse(BaseRequest $request, $params = [])
    {
        $request->load($params, '');
        if ($request->validate()) {
            return $request->getResult();
        }
        return $request;
    }
}