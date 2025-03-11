<?php
/*
 *   Jamshidbek Akhlidinov
 *   12 - 1 2024 22:3:4
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel app\modules\admin\modules\landingElement\search\TeamSearch
 * @var $models app\modules\admin\modules\landingElement\controllers\TeamController
 * @var $this yii\web\View
 */

use app\modules\admin\modules\landingElement\components\buttons\TeamButtons;
use yii\bootstrap5\Html;
use yii\grid\ActionColumn;
use yii\grid\SerialColumn;

$this->title = translate("Team members");
params()['breadcrumbs'][] = ['label' => translate("Landing Element"), 'url' => ['/admin/landingElement']];
params()['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2><?= $this->title ?></h2>
        <?= Html::a(
            translate("Add Members"),
            ['team/create'],
            ['class' => 'btn btn-primary']
        ) ?>
    </div>
</div>
<div id="teamlist">
    <?php
    echo \yii\widgets\ListView::widget([
        'itemView' => '_item',
        'dataProvider' => $dataProvider,
        'itemOptions' => [
            'tag' => false
        ],
        'options' => [
            'class' => 'team-list grid-view-filter row',
            'id' => 'team-member-list'
        ],
    ])

    ?>
</div>
