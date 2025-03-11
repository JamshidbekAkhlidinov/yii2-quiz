<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:36:02
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\models\TelegramCompany;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\modules\telegram\searches\TelegramCompanySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Telegram Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telegram-company-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate('Create Telegram Company'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-header">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'bot_token',
            'status',
            'admin_ids',
            'admin_url:url',
            //'channel_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TelegramCompany $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    </div>
</div>
