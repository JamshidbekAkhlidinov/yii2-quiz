<?php

namespace app\modules\admin\controllers;

use app\modules\admin\forms\UploadDocumentForm;
use yii\web\Controller;

class UploadFileController extends Controller
{

    public function actionDoc()
    {
        $form = new UploadDocumentForm();
        if ($form->load(\Yii::$app->request->post()) && $form->save()) {
            session()->setFlash('alert', [
                'body' => translate('File successfully uploaded'),
                'options' => ['class' => 'alert alert-success']
            ]);
            return $this->redirect(['test/index']);
        }
        return $this->render('upload', ['model' => $form]);
    }
}