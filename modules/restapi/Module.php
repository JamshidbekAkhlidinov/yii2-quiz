<?php

namespace app\modules\restapi;

use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\restapi\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::$app->errorHandler->errorAction = '/restapi/default/error';
        Yii::$app->user->enableSession = false;
        Yii::$app->user->loginUrl = null;
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->language = 'uz';

        $this->modules = [
            'v1' => \app\modules\restapi\modules\v1\Module::class,
        ];
    }

}
