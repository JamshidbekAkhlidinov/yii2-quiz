<?php
/*
 *  Jamshidbek Akhlidinov
 *   27 - 4 2024 18:46:1
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\telegram\base;

use yii\base\Model;

abstract class BaseRequest extends Model
{
    abstract public function getMessage();
}