<?php
/*
 *   Jamshidbek Akhlidinov
 *   28 - 06 2024 11:07:25
 *   https://github.com/JamshidbekAkhlidinov
*/

/** @var yii\web\View $this */

/** @var app\modules\admin\models\Question $model */

use yii\helpers\Html;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => translate('Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$css = <<<CSS
.list_class::marker{
    font-weight: 900;
}
CSS;
$this->registerCss($css);
?>
<div class="card ribbon-box border-2 shadow-none mb-lg-0">
    <div class="card-body ribbon-content text-muted">
        <h2><?= translate("Question") ?></h2>
        <div class="p-2"></div>
        <?php
        echo $model->text;
        ?>
    </div>
</div>

<div class="card ribbon-box border-2 shadow-none mb-lg-0 mt-2">
    <div class="card-body ribbon-content text-muted">
        <h2>
            <?= translate("Answers") ?>
        </h2>
        <ol type="A">
            <?php
            foreach ($model->getAnswers()->active()->all() as $answer) {
                echo Html::tag(
                    'li',
                    $answer->text,
                    [
                        'class' => 'list_class',
                        'style' =>
                            $answer->correct_answer == 1 ? 'color:green' : 'color:#ff8907e6',
                    ]
                );
            }
            ?>
        </ol>
    </div>
</div>