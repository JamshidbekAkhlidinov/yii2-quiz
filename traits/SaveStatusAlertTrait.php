<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 18:32:16
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov/yii2basic
 */

namespace app\traits;

trait SaveStatusAlertTrait
{
    protected function registerSaveStatusTrait(bool $isSaved, string $okMessage, string $failMessage)
    {
        if ($isSaved) {
            session()->setFlash('alert', [
                'options' => ['class' => 'alert-success'],
                'body' => $okMessage
            ]);
        } else {
            session()->setFlash('alert', [
                'options' => ['class' => 'alert-danger'],
                'body' => $failMessage
            ]);
        }
        return $isSaved;
    }
}