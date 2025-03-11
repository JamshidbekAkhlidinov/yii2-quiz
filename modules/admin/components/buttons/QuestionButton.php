<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 6 2024 16:45:7
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\modules\admin\components\buttons;

use app\modules\admin\models\Question;
use app\modules\admin\widgets\modal\ModalWidget;
use yii\helpers\Html;
use yii\helpers\Url;

class QuestionButton
{

    public static function view(Question $model)
    {
        return ModalWidget::widget([
            'url' => Url::to(['question/view', 'id' => $model->id]),
            'footer' => Html::a(
                    translate("Update"),
                    [
                        'update', 'id' => $model->id,
                    ],
                    [
                        'class' => 'btn btn-success btn-xs'
                    ]
                ) . Html::a(
                    translate("Delete"),
                    [
                        'delete', 'id' => $model->id,
                    ],
                    [
                        'class' => 'btn btn-danger btn-xs',
                        'data' => [
                            'confirm' => translate('Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]
                ),
            'button' => [
                'tag' => 'a',
                'label' => wordwrap(strip_tags($model->text), 50, "</br>"),
                'options' => [
                    'style' => [
                        'text-align' => 'left'
                    ]
                ]
            ],
            'header' => translate("Question view"),
            'model_size' => 'modal-lg  modal-dialog-scrollable'
        ]);
    }
}