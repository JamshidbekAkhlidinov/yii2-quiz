<?php
/*
 *   Jamshidbek Akhlidinov
 *   8 - 5 2024 9:33:43
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\traits;

trait  ControllerDeleteAction
{
    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $exception) {
            session()->setFlash('alert', [
                'body' => $exception->getMessage(),
                'options' => ['class' => 'alert alert-danger']
            ]);
        }
        return $this->redirect('index');
    }
}