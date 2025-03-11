<?php
/*
 *  Jamshidbek Akhlidinov
 *   28 - 5 2024 12:31:49
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram;

use yii\web\Response;

/**
 * telegram module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\telegram\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        app()->response->format = Response::FORMAT_JSON;
        parent::init();
    }
}
