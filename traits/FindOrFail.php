<?php
/*
 *   Jamshidbek Akhlidinov
 *   27 - 4 2024 12:29:4
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\traits;

use yii\web\NotFoundHttpException;

trait FindOrFail
{
    /**
     * @throws NotFoundHttpException
     */
    public static function findOrFail($conditions)
    {
        $model = self::findOne($conditions);
        if (!$model) {
            throw new NotFoundHttpException("Not found model");
        }
        return $model;
    }
}