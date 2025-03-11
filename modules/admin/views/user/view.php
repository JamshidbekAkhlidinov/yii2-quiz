<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->username;
Yii::$app->params['breadcrumbs'][] = ['label' => translate('Users'), 'url' => ['index']];
Yii::$app->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view card">
    <div class="card-header d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(translate('Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(translate('Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => translate('Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
    <div class="card-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'auth_key',
                'access_token',
                //'password_hash',
                //'oauth_client',
                //'oauth_client_user_id',
                'email:email',
                'status',
                'created_at',
                'updated_at',
                'logged_at',
            ],
        ]) ?>
    </div>
</div>
