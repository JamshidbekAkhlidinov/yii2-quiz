<?php
/*
 *   Jamshidbek Akhlidinov
 *   15 - 2 2024 19:10:24
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\restapi\base;

use yii\base\Model;

abstract class BaseRequest extends Model
{
    abstract public function getResult();
}