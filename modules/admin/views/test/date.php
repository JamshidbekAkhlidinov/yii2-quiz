<?php
/*
 *   Jamshidbek Akhlidinov
 *   25 - 12 2023 3:19:16
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */


use app\modules\admin\widgets\input\ColorPicker;
use app\modules\admin\widgets\input\FlatPicker;
use yii\bootstrap5\ActiveForm;

$activeForm = ActiveForm::begin();

echo $activeForm->field($form, 'date')->widget(FlatPicker::class, [
    'dataRangeDate' => true,
]);

//echo $activeForm->field($form, 'color')->textInput(['id' => "avatar_path_input"]);

echo alexantr\elfinder\InputFile::widget([
    'name' => 'color',
    'clientRoute' => '/admin/file/default/input',
    'options'=>[
        'id' => "avatar_path_input"
    ],
    'filter' => ['image'],
]) ;


echo yii\helpers\Html::img("", ['width' => 200,'id'=>'testetstest']);

$js = <<<JS
    $("#avatar_path_input").change(function (e){
       $("#testetstest").attr('src',e.target.value)
       console.log(e.target.value)
    });
JS;

$this->registerJs($js);
