<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\components\buttons\QuestionButton;
use app\modules\admin\models\Question;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\QuestionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Questions');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(<<<JS
function copyToClipboard() {
    // Nusxa olinadigan URLni tugmaning 'data-url' atributidan olamiz
    var url = document.getElementById("copy-link-btn").getAttribute("data-url");

    // Vaqtinchalik input yarating
    var tempInput = document.createElement("input");
    document.body.appendChild(tempInput);
    tempInput.value = url;
    
    // URL ni tanlash va clipboardga nusxalash
    tempInput.select();
    document.execCommand("copy");
    
    // Inputni olib tashlaymiz
    document.body.removeChild(tempInput);

    // Foydalanuvchiga xabar chiqarish (masalan, alert yoki toast)
    alert("Link nusxalandi: " + url);
}
JS, \yii\web\View::POS_HEAD
);
?>
<div class="question-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::button(
                translate("CopyLink"),
                [
                    'class' => 'btn btn-primary',
                    'id' => 'copy-link-btn',
                    'onclick' => 'copyToClipboard()',
                    'data-url' => Yii::$app->urlManager->createAbsoluteUrl([
                        '/user/default/create',
                        'subject_id' => Yii::$app->request->get('subject_id'),
                        'test_id' => Yii::$app->request->get('test_id')
                    ])
                ]
            ) ?>
            <?= Html::a(
                translate('Create Question'),
                [
                    'create',
                    'subject_id' => get('subject_id'),
                    'test_id' => get('test_id'),
                ],
                ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'subject_id',
                //'test_id',
                [
                    'attribute' => 'text',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return QuestionButton::view($data);
                    },
                ],
                //'status',
                'ball',
                'created_at',
                //'updated_at',
                [
                    'attribute' => 'created_by',
                    'format' => 'raw',
                    'value' => function ($model) {
                        if ($user = $model->createdBy) {
                            return $user->publicIdentity;
                        }
                    }
                ],
                [
                    'class' => ActionColumn::className(),
                    'template' => '{delete}',
                    'urlCreator' => function ($action, Question $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
                //'updated_by',
            ],
        ]); ?>

    </div>
</div>
