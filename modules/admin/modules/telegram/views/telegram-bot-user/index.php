<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 05 2024 08:37:42
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\models\TelegramBotUser;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\telegram\searches\TelegramBotUserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Telegram Bot Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telegram-bot-user-index card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(translate('Create Telegram Bot User'), ['create'], ['class' => 'btn btn-success']) ?>
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
                [
                    'attribute' => 'telegram_company_id',
                    'value' => function ($model) {
                        if ($company = $model->telegramCompany)
                            return $company->name;
                    }
                ],
                'telegram_user_id',
                'username',
                'phone_number',
                //'balance',
                'is_admin',
                //'is_block',
                //'step',
                //'full_name',
                //'options:ntext',
                'created_at',
                //'updated_at',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, TelegramBotUser $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
