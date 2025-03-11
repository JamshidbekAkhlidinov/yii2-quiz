<?php
/*
 *   Jamshidbek Akhlidinov
 *   1 - 12 2024 21:31:38
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Card $model
 * @var $dataProvider \yii\data\ActiveDataProvider
 * */

$card  = $model;
?>


<?php

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model, $key, $index, $widget) use ($card) {
        return $this->render('_card', [
            'model' => $model,
            'card' => $card,
        ]);
    },
    'layout' => "{items}\n",
    'itemOptions' => [
        'tag' => false,
    ],
    'options' => [
        'class' => 'row',
        'id' => 'cardList',
    ]

]);

?>


