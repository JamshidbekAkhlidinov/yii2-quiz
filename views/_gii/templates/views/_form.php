<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var yii\gii\generators\crud\Generator $generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>
/*
 *   Jamshidbek Akhlidinov
 *   <?php echo date('d - m Y H:i:s')."\n"; ?>
 *   https://github.com/JamshidbekAkhlidinov
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->modelClass, '\\') ?> $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">

    <?= "<?php " ?>$form = ActiveForm::begin(); ?>

    <div class="row">
<?php foreach ($generator->getColumnNames() as $attribute) {
if (in_array($attribute, $safeAttributes)) {?>
        <div class="col-md-6">
    <?php echo "        <?= " . $generator->generateActiveField($attribute) . " ?>\n";
    ?>
        </div>
<?php } } ?>
    </div>
    <div class="form-group pt-2">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
