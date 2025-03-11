<?php

use app\models\User;
use rmrevin\yii\fontawesome\FA;
use rmrevin\yii\fontawesome\FontAwesome;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = translate('Users');
Yii::$app->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index card">

    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(FontAwesome::icon(FA::_PLUS), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                'username',
                //'auth_key',
                //'access_token',
                //'password_hash',
                //'oauth_client',
                //'oauth_client_user_id',
                'email:email',
                'status',
                //'created_at',
                //'updated_at',
                'logged_at',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, User $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>
