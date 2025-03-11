<?php

/** @var string $content */

use app\assets\FrontendAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;


FrontendAsset::register($this);

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

?>
<?php $this->beginPage() ?>
<!doctype html>
<html
        lang="<?= Yii::$app->language ?>"
>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar-example">
<?php $this->beginBody() ?>


<?php echo $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

