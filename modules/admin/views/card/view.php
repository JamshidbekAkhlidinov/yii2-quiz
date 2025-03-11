<?php
/*
 *   Jamshidbek Akhlidinov
 *   30 - 07 2024 16:53:25
 *   https://github.com/JamshidbekAkhlidinov
*/

use app\modules\admin\models\CardAssigned;
use yii\bootstrap5\LinkPager;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Card $model
 * @var $dataProvider \yii\data\ActiveDataProvider
 * */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => translate('Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-view card">
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
            <?= Html::a(
                translate('CreateBlanc'),
                ['create-blanc', 'id' => $model->id], [
                'class' => 'btn btn-info',
                'data' => [
                    'confirm' => translate('Are you sure you want to create this items?'),
                ],
            ]) ?>
        </p>
    </div>
    <div class="card-header">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'subject_id',
                    'value' => static function ($model) {
                        if ($data = $model->subject) {
                            return $data->name;
                        }
                        return null;
                    }
                ],
                'name',
                'count',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return getStatus($model->status);
                    }
                ],
            ],
        ]) ?>
    </div>
</div>


<div class="card ">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Assigned Cards</h3>
        <a href="<?=Url::to(['card/preview-pdf','id'=>$model->id])?>" class="btn btn-success">PDFga o'girish</a>
    </div>
</div>

<?php echo $this->render('_list',['dataProvider'=>$dataProvider,'model'=>$model]); ?>


