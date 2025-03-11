<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\modules\rbac\models\AuthItemChild $model */

$this->title = $model->parent;
$this->params['breadcrumbs'][] = ['label' => translate('Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="auth-item-child-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(translate('Update'), ['update', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(translate('Delete'), ['delete', 'parent' => $model->parent, 'child' => $model->child], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => translate('Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'parent',
            'child',
        ],
    ]) ?>

</div>
