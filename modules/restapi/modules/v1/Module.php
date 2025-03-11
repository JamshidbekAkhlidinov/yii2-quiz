<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:7:4
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\modules\v1;

use Yii;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\restapi\modules\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        Yii::$app->user->enableSession = false;
        Yii::$app->user->loginUrl = null;
    }
}
